<?php

namespace Obrazki\pfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class adresType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('miasto')
            ->add('ulica')
            ->add('kodpocztowy')
->add('nrTelefonu')
//            ->add('nrTelefonu','integer',array('attr'=>array('class'=>'','id'=>'')))

            ->add('email')
//            ->add('klienci')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\pfBundle\Entity\adres'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_pfbundle_adres';
    }
}
