<?php

namespace App\Form;

use App\Entity\Heritage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\Parents;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class RegistrationFormType extends AbstractType
{
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('Parents_pseudo')
//            ->add('plainPassword', PasswordType::class, [
//                // instead of being set onto the object directly,
//                // this is read and encoded in the controller
//                'mapped' => false,
//                'constraints' => [
//                    new NotBlank([
//                        'message' => 'Please enter a password',
//                    ]),
//                    new Length([
//                        'min' => 6,
//                        'minMessage' => 'Your password should be at least {{ limit }} characters',
//                        // max length allowed by Symfony for security reasons
//                        'max' => 4096,
//                    ]),
//                ],
//            ])
//        ;
//    }
//
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults([
//            'data_class' => Heritage::class,
//        ]);
//    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Parents_pseudo', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un pseudo'
                    ])
                ]
            ])
            ->add('Parents_mail', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un mail'
                    ])
                ]
            ])
            ->add('Parents_mdp', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('checkbox', CheckboxType::class, [
                'label'    => 'Jai lu et jaccepte les Conditions générales dutilisation',
                'mapped' => false,
                'constraints'=> new NotBlank([
                    'message' => 'Merci de cocher cette case'
                ])
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Parents::class,
        ));
    }
}
