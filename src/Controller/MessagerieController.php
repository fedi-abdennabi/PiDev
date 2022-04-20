<?php

namespace App\Controller;

use App\Entity\Messagerie;
use App\Form\MessagerieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagerieController extends AbstractController
{

	/**
	 * @Route("/AffAction", name="AffAction")
	 */
	public function AffAction():Response
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findAll();

		return $this->render('front/contactus.html.twig',
			[ 'message' => $message]);
	}

	/**
	 * @Route("/messagerie", name="app_messagerie")
	 */
		public function createAction (Request $request)
	{
		$message = new Messagerie();
		$message->setDateEnvoi(new \DateTime('now'));
		$message->setDateRecep(new \DateTime('now'));
		$message->setIdexpert(1);
		$message->setIdpatient(1);

		$form = $this->createForm(MessagerieType::class,$message);

		$form->handleRequest($request);
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findAll();
		if($form->isSubmitted() && $form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($form->getData());
			$em->flush();

			return $this->redirectToRoute('app_messagerie');
		}

		return $this->render('front/contactus.html.twig',
			 [ 'form' => $form->createView(),'message' => $msg
			 ]);
	}


	/**
	 * @Route("/removeAction/{id}", name="suppAction")
	 */
	public function suppAction(Messagerie $msg):Response
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($msg);
		$em->flush();
		return $this->redirectToRoute('app_messagerie');
	}



	/**
	 * @Route("/modifierAction/{id}", name="modifierAction")
	 */
	public function modifierAction (Request $request,$id)
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->find($id);
		$message->setDateEnvoi(new \DateTime('now'));
		$message->setDateRecep(new \DateTime('now'));
		$message->setIdexpert(1);
		$message->setIdpatient(1);

		$form = $this->createForm(MessagerieType::class,$message);

		$form->handleRequest($request);
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findAll();

		if($form->isSubmitted() && $form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirectToRoute('app_messagerie');
		}

		return $this->render('front/contactus.html.twig',
			[ 'form' => $form->createView(),'message' => $msg
			]);
	}

}
