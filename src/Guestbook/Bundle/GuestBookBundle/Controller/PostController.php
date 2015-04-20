<?php

namespace Guestbook\Bundle\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guestbook\Bundle\GuestbookBundle\Entity\Post;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller {
	
	public function newAction() {
		$post = new Post ();
		$form = $this->createFormBuilder ( $post )->add ( 'name', 'text' )->add ( 'email', 'text' )->add ( 'text', 'textarea' )->getForm ();
		
		return $this->render ( 'GuestBookBundle:Post:new.html.twig', array (
				'post' => $post,
				'form' => $form->createView() 
		) );
	}
	
	public function createAction(Request $request) {
		$post = new Post();
		$form = $this->createFormBuilder ( $post )->add ( 'name', 'text' )->add ( 'email', 'text' )->add ( 'text', 'textarea' )->getForm ();
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist ( $post );
			$em->flush();
			return $this->redirectToRoute ( 'home' );
		}
		else {
			return $this->render('GuestBookBundle:Post:new.html.twig', array (
					'post' => $post,
					'form' => $form->createView()
			));
		}
	}
	
	public function deleteAction(Request $request, $id) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			$repo = $em->getRepository("GuestBookBundle:Post");
			$post = $repo->find($id);
			if($post != null) {
				$em->remove($post);
				$em->flush();
				
				return $this->redirectToRoute('home');
				
			}		
	}
}

