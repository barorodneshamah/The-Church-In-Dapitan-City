<?php

namespace App\Form;

use App\Entity\ContactMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Full Name',
                'constraints' => [new Assert\NotBlank(), new Assert\Length(min: 2, max: 255)],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Your full name'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'constraints' => [new Assert\NotBlank(), new Assert\Email()],
                'attr' => ['class' => 'form-control', 'placeholder' => 'your@email.com'],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Phone (optional)',
                'required' => false,
                'attr' => ['class' => 'form-control', 'placeholder' => '+63 xxx xxx xxxx'],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Subject',
                'constraints' => [new Assert\NotBlank(), new Assert\Length(min: 3, max: 255)],
                'attr' => ['class' => 'form-control', 'placeholder' => 'How can we help you?'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [new Assert\NotBlank(), new Assert\Length(min: 10, max: 5000)],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Write your message here...', 'rows' => 6],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => ContactMessage::class]);
    }
}
