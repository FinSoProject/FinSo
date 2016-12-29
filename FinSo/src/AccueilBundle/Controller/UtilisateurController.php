<?php

namespace AccueilBundle\Controller;

use AccueilBundle\Entity\Utilisateur;
use AccueilBundle\Entity\Structure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Utilisateur controller.
 *
 */
class UtilisateurController extends Controller
{
    /**
     * Lists all utilisateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateurs = $em->getRepository('AccueilBundle:Utilisateur')->findAll();


        //$utilisateur = $em->getRepository("AccueilBundle:Utilisateur")->UtilisateurStructure();

        //foreach ($utilisateur as $user) {
            //echo $user->getStructure()->getEmail();
        //}


        return $this->render('AccueilBundle:utilisateur:index.html.twig', array(
            'utilisateurs' => $utilisateurs,
            
        ));
    }

    /**
     * Creates a new utilisateur entity.
     *
     */
    public function newAction(Request $request)
    {   
        
        $em = $this->getDoctrine()->getManager();
        $utilisateur = new Utilisateur();
        $structure = new Structure();
        $form = $this->createForm('AccueilBundle\Form\UtilisateurType', $utilisateur);
        $form1 = $this->createForm('AccueilBundle\Form\StructureType', $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $structure = new Structure();
            $structure=$utilisateur->getStructure();

            $emailuser= $utilisateur->getEmail();
            $resultatmail = $em->getRepository('AccueilBundle:Utilisateur')->findcheckmail($emailuser);

            if(empty($resultatmail)){
            $utilisateur->setStructure($structure);
            $em->persist($utilisateur);
            $em->flush($utilisateur);
            
            $this->get('session')->getFlashBag()->add(
            'success',
            'ajout effectue avec succes !'
            );

            return $this->redirectToRoute('utilisateur_new');
           }

        else{

            $this->get('session')->getFlashBag()->add(
            'erreuremail',
            'Erreur cette adresse mail existe deja'
            );
         }


        }
        
        return $this->render('AccueilBundle:utilisateur:new.html.twig', array(
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ));


    }

    /**
     * Finds and displays a utilisateur entity.
     *
     */
    public function showAction(Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);

        return $this->render('AccueilBundle:utilisateur:show.html.twig', array(
            'utilisateur' => $utilisateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing utilisateur entity.
     *
     */
    public function editAction(Request $request, Utilisateur $utilisateur)
    {
        $deleteForm = $this->createDeleteForm($utilisateur);
        $editForm = $this->createForm('AccueilBundle\Form\UtilisateurType', $utilisateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateur_edit', array('id' => $utilisateur->getId()));
        }

        return $this->render('AccueilBundle:utilisateur:edit.html.twig', array(
            'utilisateur' => $utilisateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a utilisateur entity.
     *
     */
    public function deleteAction(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createDeleteForm($utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateur);
            $em->flush($utilisateur);
        }

        return $this->redirectToRoute('utilisateur_index');
    }

    /**
     * Creates a form to delete a utilisateur entity.
     *
     * @param Utilisateur $utilisateur The utilisateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Utilisateur $utilisateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $utilisateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
