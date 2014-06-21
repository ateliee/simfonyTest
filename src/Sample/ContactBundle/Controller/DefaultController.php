<?php

namespace Sample\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sample\AdminBundle\Entity\Contact;
use Sample\ContactBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        /*
        $repository = $this->getDoctrine()->getRepository("SampleAdminBundle:Contact");
        $contact = $repository->findAll();
        if (!$contact) {
            //throw $this->createNotFoundException('No data found');
        }

        return $this->render('SampleContactBundle:Default:index.html.twig');
*/

        // Productオブジェクトを作成し、ダミーデータを設定する
        $contact = new Contact();
        //$product->setName('Test product');
        //$product->setMail('sample@test.com');

        $form = $this->createForm(new ContactType());
        /*$form = $this->createFormBuilder($contact)
            ->add('name', 'text',array('attr' => array('class' => 'input-xxlarge','placeholder' => '氏名')))
            ->add('mail', 'email',array("required" => true,'attr' => array('class' => 'input-xxlarge','placeholder' => 'メールアドレス')))
            ->add('mail_co', 'email',array("required" => true,'attr' => array('class' => 'input-xxlarge','placeholder' => 'メールアドレス(確認)')))
            ->add('contact_details', 'textarea',array("required" => true,"max_length" => 600,'attr' => array('class' => 'input-xxlarge', 'rows' => '5','placeholder' => 'お問い合わせ内容')))
            ->add('file_path', 'file',array("required" => false))
            //->add('mail', 'money', array('currency' => 'USD'))
            ->getForm();*/

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            echo $form->isValid();
            exit;
            if ($form->isValid()) {
                // データベースへの保存など、何らかのアクションを実行する
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($product);
                $em->flush();
                //$product = $form->getData();
                // データベースへの保存など、何らかのアクションを実行する
                //$em = $this->get('doctrine')->getEntityManager();
                //$em->persist($contact);
                //$em->flush();

                //$form['attachment']->getData()->move($dir, $someNewFilename);

                return $this->redirect($this->generateUrl('contact_success'));
            }
        }
        return $this->render('SampleContactBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));

/*
        $author = new Sample\AdminBundle\Entity\Contact();
        $form = $this->createForm(new AuthorType(), $author);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // the validation passed, do something with the $author object

                $this->redirect($this->generateUrl('...'));
            }
        }

        return $this->render('BlogBundle:Author:form.html.twig', array(
            'form' => $form->createView(),
        ));*/
    }
}
