<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        // HTML書き出し
        //return new Response('<html><body>Hello '.$name.'!</body></html>');
        //return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name));
        // テンプレート書き出し
        return $this->render(
            'AcmeHelloBundle:Hello:index.html.twig',
            array('name' => $name)
        );
    }
}
