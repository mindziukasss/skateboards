<?php

namespace App\Form\Skateboard;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SkateboardFilterType
 */
class SkateboardFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add(
                'searchFilter',
                TextType::class,
                [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            );

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => null,
                'attr' => ['id' => 'skateboard-filter-form'],
            ]
        );
    }
}