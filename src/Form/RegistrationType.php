<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['Registration'], // Note validation group set here
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => false,
                'label' => 'First Name',
            ])
            ->add('email', TextType::class, [
                'required' => false,
                'label' => 'Email',
            ])
            ->add('code', TextType::class, [
                'required' => false,
                'label' => 'Verification Code',
                'mapped' => false,

//                'validation_groups' => ['Default'], // If validation_groups = ['Default'] then NotBlank is validated
                'validation_groups' => ['Registration'], // If validation_groups = ['Registration'] then NotBlank is not validated
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
        ;
    }
}