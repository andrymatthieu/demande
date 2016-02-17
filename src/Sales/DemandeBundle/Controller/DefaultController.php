<?php

namespace Sales\DemandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\HttpFoundation\Response;
//use Symfony\Bundle\HttpFoundation\Request;
use Sales\DemandeBundle\Entity\demande;
use Sales\DemandeBundle\Form\demandeType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SalesDemandeBundle:Default:main.html.twig');
    }
	public function listAction()
	{
		$listdemande = $this->getDoctrine()->getRepository("SalesDemandeBundle:demande")->findAll();
		return $this->render('SalesDemandeBundle:Default:list.html.twig', array('listdemande' => $listdemande));
	}
	public function insertAction(Request $request){
		
	}
	
	public function addAction(){
		$demande = new demande();
		$form = $this->createForm(new demandeType(),$demande, array(
		      'action' => $this->generateUrl('sales_demande_insert'),
		));
		
		return $this->render('SalesDemandeBundles:Default:add.html.twig', array('form' => $form->createView()));
	}
}
