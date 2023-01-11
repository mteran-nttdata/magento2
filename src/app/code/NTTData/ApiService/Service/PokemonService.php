<?php

namespace NTTData\ApiService\Service;


/**
 * Class PokemonService
 */
class PokemonService
{
    
    public function __construct()
    {
        $this->baseUrl = 'https://pokeapi.co/api/v2/';
    }

    public function pokemon($number)
    {
        $url = $this->baseUrl.'pokemon/'.$number;
        $verbHttp='GET';

        return $this->sendRequest($url, $verbHttp);
    }

  
      /**
     * @param string $url
     */
    public function sendRequest($url, $verbHttp)
    {
        $ch = curl_init();

        $timeout = 5;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verbHttp);
        $data = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($http_code != 200) {
            return json_encode([
                'code'    => $http_code,
                'message' => $data,
            ]);
        }

        return $data;
    }

  

}
