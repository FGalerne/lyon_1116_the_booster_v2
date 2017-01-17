<?php

namespace BoosterBundle\Controller;

use BoosterBundle\Entity\Project;
use BoosterBundle\Form\NotesBoosterType;
use BoosterBundle\Form\NotesSocietyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Tests\Helper\FormatterHelperTest;
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
     * Creates a new project entity.
     *
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
            $project->setCreationStatus('en attente');
            $project->setStatus('proposé');
            $project->setGivenTime(0);
            $em->persist($project);
            $em->flush($project);
            return $this->redirectToRoute('dashboard_society', array('id' => $this->getUser()->getSociety()));
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

    /**
     * Page notation and comments
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notesCommentsAction(Request $request, Project $projectId)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('BoosterBundle:Project')->find($projectId);

        $form1 = $this->createForm(NotesBoosterType::class, $project);
        $form1->handleRequest($request);
        if ($form1->isSubmitted()) {
            $project = $form1->getData();
            $em->persist($project);
            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmednote.html.twig');

        }

        $form2 = $this->createForm(NotesSocietyType::class, $project);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {
            $project = $form2->getData();
            $em->persist($project);
            $em->flush();

            return $this->render('BoosterBundle:Notes:confirmednote.html.twig');
    }

    return $this-> render('BoosterBundle:Notes:notes_comments.html.twig', array(
        'form1' => $form1->createView(),
        'form2' => $form2->createView(),
    ));
    }

}
