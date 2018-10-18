<?php

namespace Prueba\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrabajadorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ci', null, ['label' => false, 'attr' => ['placeholder' => 'CI', 'class' => 'form-control pull-right']])
                ->add('nombre',null, ['label' => false, 'attr' => ['placeholder' => 'Nombre', 'class' => 'form-control pull-right']])
                ->add('apellidos',null, ['label' => false, 'attr' => ['placeholder' => 'Apellidos', 'class' => 'form-control pull-right']])
                ->add('contactos', CollectionType::class, [
                    'entry_type' => ContactoType::class,
                    'entry_options' => ['label' => false],
                    'label' => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                ])
//                ->add('estado', CollectionType::class, [
//                    'entry_type' => RegistroType::class,
//                    'entry_options' => ['label' => false],
//                    'label' => false,
//                ])
                ->add('Aceptar', SubmitType::class, [
                    'attr' => ['class' => 'btn btn-primary btn-block']
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prueba\AppBundle\Entity\Trabajador'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prueba_appbundle_trabajador';
    }


}
