<?php

namespace Sample\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Subjects Form Type
 */
class SubjectsType extends AbstractType
{
    public function getDefaultOptions(OptionsResolverInterface $resolver)
    {

        $subjects = $this->getDoctrine()
            ->getRepository('SampleAdminBundle:Subjects');
        $results = $subjects->findAll();
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
        return 'formtypebundle_subjectstype';
    }
}