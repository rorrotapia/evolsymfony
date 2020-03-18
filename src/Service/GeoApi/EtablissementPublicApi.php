<?php


namespace App\Service\GeoApi;


class EtablissementPublicApi
{
    private $curl;

    /**
     * GeoMap constructor.
     * @param int $cp
     */
    public function __construct(int $cp)
    {
        $this->curl = urlencode(substr($cp,0,2));
    }

    public function apiConnexion() {
        // crée une nouvelle ressource cURL
        $ch = curl_init();

        //functions nécessaires
        curl_setopt_array($ch, [
            // fixe l'URL et les autres options appropriées
            CURLOPT_URL => "https://etablissements-publics.api.gouv.fr/v3/departements/".$this->curl."/mission_locale",
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