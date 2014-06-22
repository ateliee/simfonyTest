<?php

namespace Sample\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Sample\AdminBundle\Entity;
use Sample\AdminBundle\Entity\Subjects;

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
    public function createAction()
    {
        /*$product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id '.$product->getId());*/
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
    public function subjectsNewAction(Request $request)
    {
        // Productオブジェクトを作成し、ダミーデータを設定する
        $subjects = new Subjects();
        //$product->setName('Test product');
        //$product->setMail('sample@test.com');

        $form = $this->createFormBuilder($subjects)
            ->add('name', 'text',array('attr' => array('class' => 'form-control','placeholder' => '名前')))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $user = $this->getUser();
            print_r ($user);
            exit;
            $request->request->set("user",$user);
            $form->bind($request);

            if ($form->isValid()) {
                // データベースへの保存など、何らかのアクションを実行する
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($subjects);
                $em->flush();
                //$product = $form->getData();
                // データベースへの保存など、何らかのアクションを実行する
                //$em = $this->get('doctrine')->getEntityManager();
                //$em->persist($contact);
                //$em->flush();

                //$form['attachment']->getData()->move($dir, $someNewFilename);

                return $this->redirect($this->generateUrl('admin_subjects'));
            }
        }
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
        return $this->render('SampleAdminBundle:Default:subjectsNew.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function subjectsEditAction($id)
    {
        return $this->render('SampleAdminBundle:Default:subjectsEdit.html.twig', array('id' => $id));
    }
    public function loginAction(){
        $request = $this->getRequest();
        $session = $request->getSession();

        // ログインエラーがあれば、ここで取得
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('SampleAdminBundle:Default:login.html.twig', array(
            // ユーザによって前回入力された username
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
}
