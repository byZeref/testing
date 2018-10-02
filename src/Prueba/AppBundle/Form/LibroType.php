<?php

namespace Prueba\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titulo')
                ->add('genero')
                ->add('fechaLanzamiento', DateType::class, ['label' => 'Fecha de Lanzamiento'])
                ->add('cantUnidades', IntegerType::class, ['label' => 'Unidades'])
                ->add('nombAutor', TextType::class, ['label' => 'Autor'])
                ->add('Aceptar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prueba\AppBundle\Entity\Libro'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prueba_appbundle_libro';
    }


}
