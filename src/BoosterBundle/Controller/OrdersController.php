<?php
namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
                'return_url' => $this->generateUrl('transaction_'.$action, array(
                    'id' => $clientId,
                ), UrlGeneratorInterface::ABSOLUTE_URL),

                'cancel_url' => $this->generateUrl('dashboardSociety', array(
                    'id' => $clientId,
                    'paymentStatus' => 'error',
                ), UrlGeneratorInterface::ABSOLUTE_URL),

                'useraction' => 'commit',
            ),
        );

        $form = $this->createForm('jms_choose_payment_method', null, array(
            'amount'   => $order->getAmount(),
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
            )));
        }

        return $this->render('BoosterBundle:Orders:show.html.twig', array(
            'order' => $order,
            'form'  => $form->createView(),
        ));
    }

    private function createPayment($order)
    {
        $instruction = $order->getPaymentInstruction();
        $pendingTransaction = $instruction->getPendingTransaction();

        if ($pendingTransaction !== null) {
            return $pendingTransaction->getPayment();
        }

        $ppc = $this->get('payment.plugin_controller');
        $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

        return $ppc->createPayment($instruction->getId(), $amount);
    }

    public function paymentCreateAction(Order $order)
    {
        $payment = $this->createPayment($order);

        $ppc = $this->get('payment.plugin_controller');
        $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

        if ($result->getStatus() === Result::STATUS_SUCCESS) {
            return $this->redirect($this->generateUrl('app_orders_paymentcomplete', [
                'id' => $order->getId(),
            ]));
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

}