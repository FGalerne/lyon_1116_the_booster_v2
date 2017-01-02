<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Transaction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Transaction controller.
 *
 */
class TransactionController extends Controller
{
    /**
     * Lists all transaction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transactions = $em->getRepository('BoosterBundle:Transaction')->findAll();

        return $this->render('transaction/index.html.twig', array(
            'transactions' => $transactions,
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction(Request $request, $id)
    {
        $transaction = new Transaction();
        $form = $this->createForm('BoosterBundle\Form\TransactionType', $transaction);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $society = $this->getDoctrine()
            ->getRepository('BoosterBundle:Society')
            ->findOneById($id);
        $transaction->setSociety($society);
        $transaction->setCreateTime(new \DateTime('now'));
        $em->persist($transaction);
        $em->flush($transaction);

        return $this->redirectToRoute('dashboard_society', array('id' => $id));
    }

    /**
     * Finds and displays a transaction entity.
     *
     */
    public function showAction(Transaction $transaction)
    {
        $deleteForm = $this->createDeleteForm($transaction);

        return $this->render('transaction/show.html.twig', array(
            'transaction' => $transaction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transaction entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        /*$deleteForm = $this->createDeleteForm($transaction);
        $editForm = $this->createForm('BoosterBundle\Form\TransactionType', $transaction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transaction_edit', array('id' => $transaction->getId()));
        }

        return $this->render('transaction/edit.html.twig', array(
            'transaction' => $transaction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));*/
        $em = $this->getDoctrine()->getManager();

        $transaction = $this->getDoctrine()
            ->getRepository('BoosterBundle:Transaction')
            ->updateTransaction($id);
        return $this->redirectToRoute('dashboard_society', array('id' => $id));
    }

    /**
     * Deletes a transaction entity.
     *
     */
    public function deleteAction(Request $request, Transaction $transaction)
    {
        $form = $this->createDeleteForm($transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transaction);
            $em->flush($transaction);
        }

        return $this->redirectToRoute('transaction_index');
    }

    /**
     * Creates a form to delete a transaction entity.
     *
     * @param Transaction $transaction The transaction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transaction $transaction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transaction_delete', array('id' => $transaction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
