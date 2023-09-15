<?php

namespace App\Controller;

use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ChuckNorrisController extends AbstractController
{
    #[Route('/chuck-norris/joke', name: 'app_chuck_norris')]
    public function index(HttpClientInterface $client): Response
    {
            // Prendre une blague
        try {
            $response = $client->request(
                'GET',
                'https://api.chucknorris.io/jokes/random'
            );


        $joke = $response->toArray();

            // Traduction
            $recherche = urlencode(str_replace('.','#',$joke['value'])) ;
            $response = $client->request(
                'GET',
                "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=${recherche}",
            );
            $translate = $response->toArray();
            $blague['anglais'] = $joke['value'];
            $blague['francais'] = str_replace("#",".",$translate[0][0][0]);

        $images = [
            "https://www.nanarland.com/uploads/content/acteurs/chucknorris/chucknorris.jpg",
            "https://media.gettyimages.com/id/529204116/fr/photo/a-portrait-of-the-american-actor-chuck-norris-taken-in-munich-germany-a-former-karate-champion.jpg?s=612x612&w=gi&k=20&c=fwg8jN0j14Zi_bzvl10j3NSSgvUdTpZavNFJ2XroQCo=",
            "https://neural.love/cdn/ai-photostock/1ee42c86-97bc-6c9e-9e6e-27b5d18205ba/0.jpg?Expires=1698796799&Signature=XeDvaGuNpvuZutD-EGBL9aJMZwq7MyQeFoV2SjPbZ0s8ZON1CcXIgO5~6TXBCN4BQzUXYBg1oyVzxuu-vbTw4flPXGxODm5utPdiFfzAJA~3n4ewl1fBFO6GWpWEezoA8QREuKrFsrLrTsnMUEjfP5xyh~HaDoAwtoyyPIwzZQBjb75IVl2iqtxR6n2R1XORdRPvcWjH6ZTTFmvjhnfoo4qlhoME-BnXcC-EwLywH5mnDHu~NeOgjAR~r34yUyKCvWpIL9oQ0mYoq7BaNdK4lMg0lrkY2vgJ7mm2sC4eSdaQccilwHnFZ~mIigEaNhd~hcq1tH2Kfgq7vJfT0jQyaA__&Key-Pair-Id=K2RFTOXRBNSROX",
            "https://neural.love/cdn/ai-photostock/1ee465e2-d0e5-66ac-a900-77d17cbde453/1.jpg?Expires=1698796799&Signature=MQPhV~vLPLJq0Sl0Ze-ESKFD-vsFigQtd15ofWFT7W-KCwD34ltGilQ-2uTa~9g1BHkmm-TQL0zo-Gz~Gp~T1b8Zh7M5Vy6K3nLXQQ~UF2TQouijogsJ~iluLjqN78MVjh0B2tp7J0lVSEEJ1cj660a6WcjPxnyVcqSOLW24CMJ7O-pjyiXYptbvsg5-POJCx8e4scgb-N2KW4~Bvk-kTd9SrlwxJAb~cSPFZTXuLLrs~l6A~Vt-jX9MpOlR-l~jGgaTHxcxCgfC10L0T-Am4dG7~CjmcOvnkCVZDfwhhiEzt3sg0zqd49iHCFUFNIbOW--qYBSVFQ3UjtL8WBxxGQ__&Key-Pair-Id=K2RFTOXRBNSROX",
            "https://neural.love/cdn/ai-photostock/1ee4a0ee-c69a-64da-8185-5fd15d0c0050/0.jpg?Expires=1698796799&Signature=4P4pluCfqE9Wbd8pj5AHQvXve3uKqgXGF3-feVUNeuZIahAOKZ6TSIEn5rdUQlUbCrxnx~4UZ~zg88ypERY5BMtFyfm0FE35un4r~O0XmSOSBaYMLz~cQuQ7HD5ZvrlafOghNBKJENYyc-8pzTT0Uzixjx4czo6U8RIhBDju0K69LUxD-O1j-NkZ4uXJIy~BT9VdUC5sAC85p6ibgBOzsN~FvdAgxccCgJo1i7OdYYXryd14kIKGsvKhVCVokVCq1vSoK7Mi6rvvTzhRIpehk7~KP5I~wWaxPGifJKZNKjWdttBS2nk9ngl5OZzVrheZaH1HHbiQV1Bo3OxWXMMO7Q__&Key-Pair-Id=K2RFTOXRBNSROX"
        ];
        } catch (ExceptionInterface $e) {
        } 

        return $this->render("chuck_norris/index.html.twig",[
          'blague' => $blague??null,
          'images' => $images
      ]);
    }
}
