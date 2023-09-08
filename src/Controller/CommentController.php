<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/c/o/m/m/e/n/t', name: 'app_c_o_m_m_e_n_t')]
    public function index(): Response
    {
        return $this->render('comment/show.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
