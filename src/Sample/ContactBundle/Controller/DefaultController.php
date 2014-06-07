<?php

namespace Sample\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sample\AdminBundle\SampleAdminBundle\Entitiy;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("SampleAdminBundle:Contact");
        $contact = $repository->findAll();
        if (!$contact) {
            throw $this->createNotFoundException('No data found');
        }

        return $this->render('SampleContactBundle:Default:index.html.twig');
    }
}
