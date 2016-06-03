<?php

namespace qatarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true
            ))
            ->add('prenom', 'text', array(
                'required' => true
            ))
            ->add('email', 'email', array(
                'required' => true
            ))
            ->add('telephone', 'text', array(
                'required' => true
            ))
            ->add('detail', 'textarea', array(
                'required' => false
            ))
            ->add('valider', 'submit', array(
                'label' => 'Procéder au paiement'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'qatarBundle\Entity\Reservation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
