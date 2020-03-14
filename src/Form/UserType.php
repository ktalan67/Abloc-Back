<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('roles')
            ->add('password')
            ->add('account_name')
            ->add('img_path')
            ->add('available_time', IntegerType::class, [
                'label' => 'Available Time per Week'])
            ->add('score', IntegerType::class, [
                'label' => 'Score'])
            ->add('created_at')
            ->add('updated_at')
            ->add('program_bookmarks')
            ->add('exercise_bookmarks')
            ->add('followed_programs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
