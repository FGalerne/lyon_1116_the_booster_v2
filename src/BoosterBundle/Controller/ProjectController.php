<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Project controller.
 *
 */
class ProjectController extends Controller
{
    /**
     * Lists all project entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('BoosterBundle:Project')->findAll();

        return $this->render('project/index.html.twig', array(
            'projects' => $projects,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm('BoosterBundle\Form\ProjectType', $project);
        $form->handleRequest($request);
        $time = new \DateTime();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $project->setSociety($this->getUser()->getSociety());
            $project->setCreateTime($time);
            $project->setCreationStatus(False);
            $project->setStatus('Open');
            $project->setGivenTime(0);

            //Set the variable used for sending the email.
            $projectName = $form['projectName']->getData();
            $category = $form['category']->getData();
            $subjectToWebmaster = 'Un projet est en attente de validation sur The-Booster.com';
            $from = $this->getParameter('mailer_user');
            $to = $this->getParameter('mailer_to');

            // Sends an email to warn the web site manager that a project is waiting for a validation to be published.
            $sendMessageToWebmaster = \Swift_Message::newInstance()
                ->setSubject($subjectToWebmaster)
                ->setFrom($from)
                ->setTo($to)
                ->setBody(
                    $this->renderView(
                        'BoosterBundle:Emails:project_validation_email.html.twig',
                        array(
                            'project_name' => $projectName,
                            'category' => $category,
                            'project'  => $project,
                        )
                    ),
                    'text/html'
                );
            $subjectToUser = 'Votre projet est en attente de modération sur The-Booster.com';
            // Here the code to get the email of the user when we use FosUserBundle.
            $toUser = $this->get('security.context')->getToken()->getUser()->getEmail();
            // Sends an email to warn the user that his project is waiting for a validation to be published.
            $sendMessageToSociety = \Swift_Message::newInstance()
                ->setSubject($subjectToUser)
                ->setFrom($from)
                ->setTo($toUser)
                ->setBody(
                    $this->renderView(
                        'BoosterBundle:Emails:project_booste_mail_validation.html.twig',
                        array(
                            'project_name' => $projectName,
                            'category' => $category,
                            'project'  => $project,
                        )
                    ),
                    'text/html'
                );

            $this->get('mailer')->send($sendMessageToWebmaster);
            $this->get('mailer')->send($sendMessageToSociety);


            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute('dashboard_society', array(
                'id' => $this->getUser()->getSociety()->getId()
            ));
        }

        return $this->render('BoosterBundle:Front:deposer_un_projet.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a project entity.
     *
     */
    public function showAction(Project $project)
    {
        $deleteForm = $this->createDeleteForm($project);

        return $this->render('project/show.html.twig', array(
            'project' => $project,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing project entity.
     *
     */
    public function editAction(Request $request, Project $project)
    {
        $deleteForm = $this->createDeleteForm($project);
        $editForm = $this->createForm('BoosterBundle\Form\ProjectType', $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project_edit', array('id' => $project->getId()));
        }

        return $this->render('project/edit.html.twig', array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a project entity.
     *
     */
    public function deleteAction(Request $request, Project $project)
    {
        $form = $this->createDeleteForm($project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush($project);
        }

        return $this->redirectToRoute('project_index');
    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param Project $project The project entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Project $project)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
