<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class EarthQuakesController extends AbstractController
{
    #[Route('/earth/quakes', name: 'app_earth_quakes')]
    public function index(HttpClientInterface $client): Response
    {
        $response = $client->request('GET', 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2020-01-01&endtime=2020-06-06&alertlevel=yellow');
        $datas = $response->toArray();
//        $features = $datas['features'];
        $features = $datas['features'];
        $coordinates = $datas['features'][0]['geometry']['coordinates'];

//        dd($features);
//        dd($coordinates);

        return $this->render('earth_quakes/index.html.twig', [
            'controller_name' => 'EarthQuakesController',
            'features' => $features,
//            'coordinates' => $coordinates
        ]);
    }
}
