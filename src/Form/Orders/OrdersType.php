<?php

namespace App\Form\Orders;

use App\Entity\Orders\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class OrdersType
 */
class OrdersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => false,
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Jon',
                        'class' => 'form-control',
                    ],
                ]

            )
            ->add(
                'surname',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Snow',
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'constraints' => [new NotBlank(), new Email()],
                    'attr' => [
                        'placeholder' => 'email@email.com',
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'phone',
                NumberType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => '860123456',
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'city',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'New Your',
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'address',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => [
                        'placeholder' => 'Broadway st., 00-00',
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
                'data_class' => Orders::class,
            ]
        );
    }
}