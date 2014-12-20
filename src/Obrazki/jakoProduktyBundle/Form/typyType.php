<?php

namespace Obrazki\jakoProduktyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class typyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $choices = array(
//                    'choices' => array(
//                                1 => 'filter.yes',
//                                0 => 'filter.no',
//                            ),
//                        'required'=>false,
//                        'translation_domain'=>'ReConfiguratorBundle',
//                    );
        $builder

            ->add('atrybuty')
            ->add('kubek')

            //->add('ionization', 'filter_choice', $choices)

        ;


//        $builder->add('typy', 'collection', array('atrybuty','kubek'));

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Obrazki\jakoProduktyBundle\Entity\typy'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'obrazki_jakoproduktybundle_typy';
    }
}
