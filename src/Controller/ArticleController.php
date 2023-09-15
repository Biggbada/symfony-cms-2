<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'article_show')]
    public function show(): Response
    {
        return $this->render('article/show.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }


    #[Route('/add/articles', name: 'article_batch_insert')]
    public function batchInsert(EntityManagerInterface $entityManager): void
    {
        foreach(range(0,1000) as $nb) {
            $comment = new Comment();
            $comment->setContent('test')->setCreatedAt(new \DateTime());

           $article = new Article();
           $article->setContent('Un article')->setSlug('test'.random_int(0,1000000))
           ->setTitle('Title')->setCreatedAt(new \DateTime())
           ->addComment($comment);
           $entityManager->persist($article);
            $entityManager->persist($comment);
        }
        $entityManager->flush();
        return;
    }
}
