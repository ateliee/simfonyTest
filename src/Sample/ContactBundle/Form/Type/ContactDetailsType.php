<?php

namespace Sample\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Contact Details Form Type
 */
class ContactDetailsType extends AbstractType
{
    public function getDefaultOptions(OptionsResolverInterface $resolver)
    {

        $contact_details = $this->getDoctrine()
            ->getRepository('SampleAdminBundle:ContactDetails');
        $results = $contact_details->findAll();
/*
        $results = $this->om->getRepository('SampleAdminBundle:ContactDetails')
            ->createQueryBuilder('a')
            //->orderBy("a.id ")
            ->getQuery()->execute();*/

        $choices = array();
        foreach ($results as $data) {
            $choices[$data->getId()] = $data->getName();
        }

        $resolver->setDefaults(array(
            'choices' => $choices
        ));
        /*return array(
            'choices' => $choices,
            'label' => 'お問い合わせ内容',
            'empty_value' => '選択してください',
            'multiple' => false,
            'expanded' => false,
        );*/
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'formtypebundle_contactdetails_type';
    }
}