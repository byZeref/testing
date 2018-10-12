<?php

namespace Prueba\AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contacto', null, ['label' => false,'placeholder' => 'Tipo de contacto',  'attr' => ['class' => 'form-control pull-right']])
                ->add('valor', null, ['label' => false, 'attr' => ['placeholder' => 'Valor del contacto', 'class' => 'form-control pull-right']]);
//            ->add('trabajador', null, ['label' => false, 'placeholder' => 'Seleccione el trabajador', 'attr' => ['class' => 'form-control pull-right']])
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prueba\AppBundle\Entity\Contacto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prueba_appbundle_contacto';
    }


}
