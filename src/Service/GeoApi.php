<?php
namespace App\Service;

class GeoApi
{
    public function apiConnexion() {

        $ch = curl_init("https://geo.api.gouv.fr/communes?");
        $fp = fopen("example_homepage.txt", "w");

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);
        if(curl_error($ch)) {
            fwrite($fp, curl_error($ch));
        }
        curl_close($ch);
        fclose($fp);
    }
}