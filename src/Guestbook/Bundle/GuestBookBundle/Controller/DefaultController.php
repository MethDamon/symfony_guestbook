<?php

namespace Guestbook\Bundle\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guestbook\Bundle\GuestbookBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	
    	/*$example_post = new Post();
    	$example_post->setEmail("example@example.com");
    	$example_post->setName("Example Poster");
    	$example_post->setText("Roof party four dollar toast street art hoodie, 
    			farm-to-table try-hard seitan sustainable umami. 
    			Street art meggings tilde, cronut selvage meh direct trade");
    	$example_form = $this->createFormBuilder($example_post);
    	*/
    	$em = $this->getDoctrine()->getManager();
    	$repo = $em->getRepository('GuestBookBundle:Post');
    //	$em->persist($example_post);
		$em->flush();
    	$posts = $repo->findAll();
        return $this->render('GuestBookBundle:Default:create_button.html.twig', array(
        		'posts' => $posts
        		));
        
    }
}
