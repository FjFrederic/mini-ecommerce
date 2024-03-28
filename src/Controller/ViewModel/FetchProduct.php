<?php

namespace App\Controller\ViewModel;

use GuzzleHttp\Client;

class FetchProduct
{
    private $client;
    const CLIENT_API = 'https://fakestoreapi.com';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::CLIENT_API,
        ]);
    }

    /**
     * @return array
     */
    public function load(): array
    {
        $response = $this->client->request('GET', '/products');
        return json_decode(
            $response->getBody()->getContents(),
            true
        );
    }
}
