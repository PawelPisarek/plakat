<?php

namespace Obrazki\pfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class klientType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login')
            ->add('haslo')
            ->add('adresy',new adresType())
            ->add('zamowienia', null, array('expanded' => "true", "multiple" => "true"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\pfBundle\Entity\klient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_pfbundle_klient';
    }
}
