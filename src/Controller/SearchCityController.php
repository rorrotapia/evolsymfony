<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchCityController extends AbstractController
{
    /**
     * @Route("/", name="searchcity")
     */
    public function index()
    {
        return $this->render('searchcity/index.html.twig', [
            'controller_name' => 'SearchCityController',
        ]);
    }
}
