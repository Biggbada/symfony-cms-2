<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WebBreachesController extends AbstractController
{
    #[Route('/web/breaches', name: 'app_web_breaches')]
    public function index(HttpClientInterface $client): Response
    {
        $response = $client->request('GET', 'https://haveibeenpwned.com/api/v2/breaches')->toArray();

//        dd($response);
        return $this->render('web_breaches/index.html.twig', [
            'controller_name' => 'WebBreachesController',
            'response' => $response
        ]);
    }
}
