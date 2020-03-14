<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Program;
use App\Entity\Exercise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('roles', CollectionType::class)
           // ->add('password')
            ->add('account_name', TextType::class)
            ->add('img_path', TextType::class)
            ->add('available_time', IntegerType::class, [
                'label' => 'Available Time per Week'])
            ->add('score', IntegerType::class, [
                'label' => 'score'])
           // ->add('created_at')
          //  ->add('updated_at')   @TODO Add to Controller before flush
           //->add('program_bookmarks', ColectionType::class, [
           //      'class' => Program::class,
           //    'choice_label' => 'id',
           //    'expanded' => true,
           //    'multiple' => true,
           //]
           //)
           //->add('exercise_bookmarks', EntityType::class, [
           //    'class' => Exercise::class,
           //    'choice_label' => 'id',
           //    'expanded' => true,
           //    'multiple' => true,
           //]
           //)
           //->add('followed_programs', EntityType::class, [
           //    'class' => Program::class,
           //    'choice_label' => 'id',
           //    'expanded' => true,
           //    'multiple' => true,
           //]
           //)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
