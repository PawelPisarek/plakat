<?php

namespace Obrazki\pfBundle\Form;

use Obrazki\pfBundle\Entity\Produkt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class zamowienieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('zaplacono')
            ->add('dataWysylki')
            ->add('klienci')
            ->add('produkty',new ProduktType())
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Obrazki\pfBundle\Entity\zamowienie'
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_pfbundle_zamowienie';
    }
}
