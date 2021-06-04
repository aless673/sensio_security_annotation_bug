<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        $this->denyAccessUnlessGranted('canAccess');

        return new Response('Test page');
    }
    
    /**
     * @Route("/test_bug", name="test_bug")
     * @Security("is_granted('canAccess')")
     */
    public function test_bug()
    {
        return new Response('Test page');
    }

    /**
     * @Route("/", name="homepage")
     * @Security("is_granted('ROLE_USER')")
     */
    public function homepage()
    {
        return new Response('Home page');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return new Response('Login page');
    }
}
