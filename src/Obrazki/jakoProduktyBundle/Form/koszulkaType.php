<?php

namespace Obrazki\jakoProduktyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class koszulkaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nazwa')
//            ->add('rozmiar')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\jakoProduktyBundle\Entity\koszulka'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_jakoproduktybundle_koszulka';
    }
}
