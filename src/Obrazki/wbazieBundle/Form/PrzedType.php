<?php

namespace Obrazki\wbazieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrzedType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('nazwaObrazka')
            // ->add('grupa')
            ->add('file')
            ->getForm()
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\wbazieBundle\Entity\Przed'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_wbaziebundle_przed';
    }
}
