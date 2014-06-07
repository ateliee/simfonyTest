<?php

namespace Sample\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sample\AdminBundle\Entity;

class DefaultController extends Controller
{
    public function indexAction($page)
    {
        $contacts = array();
        return $this->render(
            'SampleAdminBundle:Default:index.html.twig',
            array('page' => $page,'contacts' => $contacts)
        );
    }
    public function detailsAction($id)
    {
        $contact = $this->getDoctrine()->getRepository("SampleAdminBundle:Contact")->find($id);
        if (!$contact) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        return $this->render('SampleAdminBundle:Default:details.html.twig', array('id' => $id));
    }
    public function replyAction($id)
    {

        /*
        // update
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $product->setName('New product name!');
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
        */
        /*
        // 削除
        $em->remove($product);
        $em->flush();
        */
        return $this->render('SampleAdminBundle:Default:reply.html.twig', array('id' => $id));
    }
    public function subjectsAction()
    {
        return $this->render('SampleAdminBundle:Default:subjects.html.twig');
    }
    public function subjectsNewAction()
    {
        /*
        $product = new ContactDetails();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id '.$product->getId());
*/
        return $this->render('SampleAdminBundle:Default:subjectsNew.html.twig');
    }
    public function subjectsEditAction($id)
    {
        return $this->render('SampleAdminBundle:Default:subjectsEdit.html.twig', array('id' => $id));
    }
}
