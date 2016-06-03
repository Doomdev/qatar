<?php

namespace qatarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorairesType extends AbstractType
{
    /**
     * @var mixed
     */
    private $horaires;

    /**
     * HorairesType constructor.
     * @param mixed $horaires
     */
    public function __construct($horaires)
    {
        $this->horaires = $horaires;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('horaires', 'choice', array(
                'choices'  => $this->horaires,
                'multiple' => true,
                'expanded' => true,
                'choices_as_values' => true,
                'choice_label' => function ($value, $key, $index) {
                    return $value;
                },
            ))
            ->add('valider', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'horaires';
    }
}
