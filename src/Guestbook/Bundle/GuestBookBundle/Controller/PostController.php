<?php

namespace Guestbook\Bundle\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Guestbook\Bundle\GuestbookBundle\Entity\Post;

class PostController extends Controller
{
    public function createAction(Request $request)
    {
    	$post = new Post();
		$form = $this->createFormBuilder($post);
		
		$form->bind($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();
    }
}
