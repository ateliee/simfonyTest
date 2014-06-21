<?php
/**
 * Created by PhpStorm.
 * User: minato
 * Date: 2014/06/16
 * Time: 22:20
 */

namespace Sample\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Sample\AdminBundle\Entity\ContactDetails;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text',array('attr' => array('class' => 'input-xxlarge','placeholder' => '氏名')));
        $builder->add('mail', 'email',array("required" => true,'attr' => array('class' => 'input-xxlarge','placeholder' => 'メールアドレス')));
        $builder->add('mail_co', 'email',array("required" => true,'attr' => array('class' => 'input-xxlarge','placeholder' => 'メールアドレス(確認)')));
        $builder->add('contact_details',
            new ContactDetailsType(),
            array(
            "required" => true,
            "empty_value" => "選択してください",
            'attr' => array('class' => 'select')
        ));
        $builder->add('message', 'textarea',array("required" => true,"max_length" => 600,'attr' => array('class' => 'input-xxlarge', 'rows' => '5','placeholder' => 'メッセージ')));
        $builder->add('file_path', 'file',array("required" => false));
        return $builder;
    }

    public function getName()
    {
        return 'contact';
    }

}