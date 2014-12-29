<?php

namespace Obrazki\jakoProduktyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class atrybutyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wrapy')// ->add('plotno')
            ->add(
                'wymiar',
                null,
                array(
                    'multiple' => false,
                    'expanded' => true
                )
            )
            ->add(
                'margines',
                    null,
                array(
                    'multiple' => false,
                    'expanded' => true
                )


            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Obrazki\jakoProduktyBundle\Entity\atrybuty'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_jakoproduktybundle_atrybuty';
    }
}
