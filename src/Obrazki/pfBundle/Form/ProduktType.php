<?php

namespace Obrazki\pfBundle\Form;

use Obrazki\jakoProduktyBundle\Form\typyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduktType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('netto')
          //  ->add('brutto')
          //  ->add('rabat')
          //  ->add('procVat')
//            ->add('zamowienia')
         //   ->add('id_zdjecia')
            ->add('id_filtru')
          //  ->add('id_typu')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\pfBundle\Entity\Produkt'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_pfbundle_produkt';
    }
}
