<?php

namespace App\Form\Type;

use App\Entity\Article;
use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class CommentType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('content', TextareaType::class, [
            'label'=> 'Votre message'
        ])
        ->add('article', HiddenType::class)
        ->add('send', SubmitType::class, [
        'label'=>'envoyer'
]);

    $builder->get('article')
        ->AddModelTransformer(new CallbackTransformer(
            fn(Article $article) => $article->getId(),
            fn(Article $article) => $article->getTitle()
        ));

}
public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data-class' => Comment::class
    ]);
}
}