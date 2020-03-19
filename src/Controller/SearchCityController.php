<?php

namespace App\Controller;

use App\Service\Form\FormSearch;
use App\Service\GeoApi\EtablissementPublicApi;
use App\Service\GeoApi\GeoCommuneApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchCityController extends AbstractController
{
    /**
     * @Route("/", name="searchcity")
     */
    public function index()
    {
        $communes = [];
        $missionlocale = [];
        $form = new FormSearch('chercher');
        if ($form->isSubmit()) {
            $form->setData($_POST['city'], $_POST['cp']);
            $form->validate();
            if ($form->isValid()) {
                $data = $form->getData();
                $curl = new GeoCommuneApi($data['city'], $data['cp']);
                $communes = $curl->apiConnexion();
                if ($communes['donnees']) {
                    $curlEtablissement = new EtablissementPublicApi( $data['cp']);
                    $missionlocale = $curlEtablissement->apiConnexion();
                }
                $this->redirectToRoute('searchcity',$data);
            }else {
                $msgForm = "Les données sont pas valides";
            }
        }

        return $this->render('searchcity/index.html.twig', [
            'communes' => $communes['donnees'] ?? null,
            'erreurs' => $communes['erreurs'] ?? null,
            'missionslocales' => $missionlocale['donnees'] ?? null,
            'erreursml' => $missionlocale['erreurs'] ?? null,
            'msgForm' => $msgForm ?? null
        ]);
    }
}
