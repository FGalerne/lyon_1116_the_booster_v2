<?php
namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Order;
use BoosterBundle\Entity\Transaction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use JMS\Payment\CoreBundle\PluginController\Result;
use JMS\Payment\CoreBundle\Plugin\Exception\Action\VisitUrl;
use JMS\Payment\CoreBundle\Plugin\Exception\ActionRequiredException;


class OrdersController extends Controller
{
    public function newAction($amount, $action, $clientId)
    {
        $em = $this->getDoctrine()->getManager();

        $order = new Order($amount);
        $em->persist($order);
        $em->flush();

        return $this->redirect($this->generateUrl('order_show', array(
            'id' => $order->getId(),
            'clientId' => $clientId,
            'action' => $action,
        )));
    }

    public function showAction(Request $request, Order $order, $clientId, $action)
    {
        $config = array(
            'paypal_express_checkout' => array(
                'return_url' => $this->generateUrl('order_payment_create', array(
                    'id' => $order->getId(),
                    'clientId' => $clientId,
                    'action' => $action,
                ), UrlGeneratorInterface::ABSOLUTE_URL),

                'cancel_url' => $this->generateUrl('dashboard_society', array(
                'id' => $clientId,
                'paymentStatus' => 'error',
                ), UrlGeneratorInterface::ABSOLUTE_URL),

                'useraction' => 'commit',
            ),
        );

        $form = $this->createForm('jms_choose_payment_method', null, array(
            'amount'   => $order->getAmount() * 1.20 ,
            'currency' => 'EUR',
            'predefined_data' => $config,
            'allowed_methods' => array('paypal_express_checkout'),
            'default_method'  => 'paypal_express_checkout',
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $ppc = $this->get('payment.plugin_controller');
            $ppc->createPaymentInstruction($instruction = $form->getData());

            $order->setPaymentInstruction($instruction);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush($order);

            return $this->redirect($this->generateUrl('order_payment_create', array(
                'id' => $order->getId(),
                'clientId' => $clientId,
                'action' => $action,
            )));
        }

        return $this->render('BoosterBundle:Orders:show.html.twig', array(
            'order' => $order,
            'form'  => $form->createView(),
        ));
    }

    private function createPayment($order, $clientId)
    {
        $instruction = $order->getPaymentInstruction();
        $pendingTransaction = $instruction->getPendingTransaction();

        if ($pendingTransaction !== null) {
            return $pendingTransaction->getPayment();
        }

        $ppc = $this->get('payment.plugin_controller');
        $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

        return $ppc->createPayment($instruction->getId(), $amount, $clientId);
    }

    public function paymentCreateAction(Order $order, $clientId, $action, Request $request)
    {
        $payment = $this->createPayment($order, $clientId);

        $ppc = $this->get('payment.plugin_controller');
        $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

        if ($result->getStatus() === Result::STATUS_SUCCESS) {
            //if a creation already exist, we just update it with new datetime
            if($action === 'edit'){
                $this->getDoctrine()
                    ->getRepository('BoosterBundle:Transaction')
                    ->updateTransaction($clientId);
            }
            //if no transaction have been done before, we create a new one
            else if($action === 'new'){
                $transaction = new Transaction();
                $form = $this->createForm('BoosterBundle\Form\TransactionType', $transaction);
                $form->handleRequest($request);

                $em = $this->getDoctrine()->getManager();
                $society = $this->getDoctrine()
                    ->getRepository('BoosterBundle:Society')
                    ->findOneById($clientId);
                $transaction->setSociety($society);
                $transaction->setCreateTime(new \DateTime('now'));
                $transaction->setEndTime(date_modify(new \DateTime('now'), "+24 hour"));
                $em->persist($transaction);
                $em->flush();
            } else {
                //this should never append
                return $this->redirect($this->generateUrl('dashboard_society', array(
                'id' => $clientId,
                'paymentStatus' => 'error',
                )));
            }

            return $this->redirect($this->generateUrl('order_payment_complete', array(
                'id' => $order->getId(),
                'clientId' => $clientId,
            )));
        }

        if ($result->getStatus() === Result::STATUS_PENDING) {
            $ex = $result->getPluginException();

            if ($ex instanceof ActionRequiredException) {
                $action = $ex->getAction();

                if ($action instanceof VisitUrl) {
                    return $this->redirect($action->getUrl());
                }

                throw $ex;
            }
        }
        throw new \Exception('Transaction was not successful: '.$result->getReasonCode());
    }

    public function paymentCompleteAction(Order $order, $clientId)
    {
        return $this->redirectToRoute('dashboard_society', array(
            'id' => $clientId,
            'paymentStatus' => 'success',
        ));
    }

}