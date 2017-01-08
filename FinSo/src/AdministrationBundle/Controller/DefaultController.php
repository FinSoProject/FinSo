<?php

namespace AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('AccueilBundle:Projet')->findAll();
        return $this->render('AdministrationBundle:Default:index.html.twig', array('projet' => $projet));
    }
    public function afficherprojetAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('AccueilBundle:Projet')->findOneBy( array('id' => $id));;
        return $this->render('AdministrationBundle:Default:affiche.html.twig', array('projet' => $projet));
    }

     public function validationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('AccueilBundle:Projet')->findOneBy( array('id' => $id));
        $validation=new Validation();
        
        return $this->render('AdministrationBundle:Default:affiche.html.twig', array('projet' => $projet));
    }

}
