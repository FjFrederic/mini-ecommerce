<?php

namespace App\Adapter\Framework;

use Core\Port\Framework\HttpClientInterface;
use GuzzleHttp\Client;

class HttpClient implements HttpClientInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function loadFromGuzzleHttp(string $url): string
    {
       /*
        * Notice : You may have SSL certificate problem in this method.
        * You need to get your cacert.pem and add this in php.ini
        * if you want to use this.
        * ------------------------------------------------------------
        *    return new Client([                                      -
        *          'base_uri' => $url,                                -
        *    ]);                                                      -
        * -------------------------------------------------------------*/
        return file_get_contents($url);
    }

    /**
     * @param string $url
     * @return string
     */
    public function loadFromFileGetContents(string $url): string
    {
        return file_get_contents($url);
    }
}
