<?php

namespace AccueilBundle\Controller;

use AccueilBundle\Entity\Contributeur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contributeur controller.
 *
 */
class ContributeurController extends Controller
{
    /**
     * Lists all contributeur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contributeurs = $em->getRepository('AccueilBundle:Contributeur')->findAll();

        return $this->render('contributeur/index.html.twig', array(
            'contributeurs' => $contributeurs,
        ));
    }

    /**
     * Creates a new contributeur entity.
     *
     */
    public function newAction(Request $request)
    {
        $contributeur = new Contributeur();
        $form = $this->createForm('AccueilBundle\Form\ContributeurType', $contributeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contributeur);
            $em->flush($contributeur);

            return $this->redirectToRoute('contributeur_show', array('id' => $contributeur->getId()));
        }

        return $this->render('contributeur/new.html.twig', array(
            'contributeur' => $contributeur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contributeur entity.
     *
     */
    public function showAction(Contributeur $contributeur)
    {
        $deleteForm = $this->createDeleteForm($contributeur);

        return $this->render('contributeur/show.html.twig', array(
            'contributeur' => $contributeur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contributeur entity.
     *
     */
    public function editAction(Request $request, Contributeur $contributeur)
    {
        $deleteForm = $this->createDeleteForm($contributeur);
        $editForm = $this->createForm('AccueilBundle\Form\ContributeurType', $contributeur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contributeur_edit', array('id' => $contributeur->getId()));
        }

        return $this->render('contributeur/edit.html.twig', array(
            'contributeur' => $contributeur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contributeur entity.
     *
     */
    public function deleteAction(Request $request, Contributeur $contributeur)
    {
        $form = $this->createDeleteForm($contributeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contributeur);
            $em->flush($contributeur);
        }

        return $this->redirectToRoute('contributeur_index');
    }

    /**
     * Creates a form to delete a contributeur entity.
     *
     * @param Contributeur $contributeur The contributeur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contributeur $contributeur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contributeur_delete', array('id' => $contributeur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
