<?php
namespace App\Service\GeoApi;

class GeoCommuneApi
{
    private $curl;

    /**
     * GeoMap constructor.
     * @param string $city
     * @param int $cp
     */
    public function __construct(string $city, int $cp)
    {
        $this->curl = 'codePostal=' . urlencode($cp) . '&nom=' . urlencode($city) . '&codeDepartement=' . urlencode(substr($cp,0,2));;
    }

    public function apiConnexion() : array
    {

        // crée une nouvelle ressource cURL
        $ch = curl_init();

        //functions nécessaires
        curl_setopt_array($ch, [
            // fixe l'URL et les autres options appropriées
            CURLOPT_URL => "https://geo.apssi.gouv.fr/communes?q=$this->curl",
            CURLOPT_RETURNTRANSFER => true,
            //CURLOPT_TIMEOUT => 1
        ]);

        $data = [
            "erreurs" => null,
            "donnees" => null
        ];
        //pour executer
        if(curl_exec($ch) == false) {
            $data['erreurs'] = (curl_error($ch));
        } else {
            $data['donnees'] = json_decode(curl_exec($ch), true);
        }
        //pour fermer l'url
        curl_close($ch);

        return $data;
    }
}