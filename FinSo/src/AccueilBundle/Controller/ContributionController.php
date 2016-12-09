<?php

namespace AccueilBundle\Controller;

use AccueilBundle\Entity\Contribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contribution controller.
 *
 */
class ContributionController extends Controller
{
    /**
     * Lists all contribution entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contributions = $em->getRepository('AccueilBundle:Contribution')->findAll();

        return $this->render('contribution/index.html.twig', array(
            'contributions' => $contributions,
        ));
    }

    /**
     * Creates a new contribution entity.
     *
     */
    public function newAction(Request $request)
    {
        $contribution = new Contribution();
        $form = $this->createForm('AccueilBundle\Form\ContributionType', $contribution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contribution);
            $em->flush($contribution);

            return $this->redirectToRoute('contribution_show', array('id' => $contribution->getId()));
        }

        return $this->render('contribution/new.html.twig', array(
            'contribution' => $contribution,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contribution entity.
     *
     */
    public function showAction(Contribution $contribution)
    {
        $deleteForm = $this->createDeleteForm($contribution);

        return $this->render('contribution/show.html.twig', array(
            'contribution' => $contribution,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contribution entity.
     *
     */
    public function editAction(Request $request, Contribution $contribution)
    {
        $deleteForm = $this->createDeleteForm($contribution);
        $editForm = $this->createForm('AccueilBundle\Form\ContributionType', $contribution);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contribution_edit', array('id' => $contribution->getId()));
        }

        return $this->render('contribution/edit.html.twig', array(
            'contribution' => $contribution,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contribution entity.
     *
     */
    public function deleteAction(Request $request, Contribution $contribution)
    {
        $form = $this->createDeleteForm($contribution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contribution);
            $em->flush($contribution);
        }

        return $this->redirectToRoute('contribution_index');
    }

    /**
     * Creates a form to delete a contribution entity.
     *
     * @param Contribution $contribution The contribution entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contribution $contribution)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contribution_delete', array('id' => $contribution->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
