<?php

namespace Guestbook\Bundle\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	
    	$form = $this->createFormBuilder()
    	->add('name', 'text')
    	->add('email', 'email')
    	->add('text', 'textarea')
    	->add('save', 'submit', array('label' => 'Create Post'))
    	->setAction($this->generateUrl('create'))
    	->setMethod('POST')
    	->getForm();
    	
    	$em = $this->getDoctrine()->getRepository('Guestbook:Post');
    	$posts = $em->findAll();
    	
    	$posts = array();
        return $this->render('GuestBookBundle:Default:index.html.twig', array(
        		'posts' => $posts,
        		'form' => $form->createView(),
        		));
    }
}
