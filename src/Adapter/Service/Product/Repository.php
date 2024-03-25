<?php

namespace App\Adapter\Service\Product;

use Core\Exception\CouldNotFetchException;
use Core\Port\Framework\HttpClientInterface;
use Core\Port\Service\Product\RepositoryInterface;

class Repository implements RepositoryInterface
{
    private $httpClient;
    const CLIENT_API = 'https://fakestoreapi.com/products';

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function fetchFromApi(): array
    {
        try {
            $response = $this->httpClient->loadFromGuzzleHttp(self::CLIENT_API);

            return json_decode($response, true);

        } catch (\Exception $error) {
            throw new CouldNotFetchException($error->getMessage(), $error->getCode(), $error);
        }
    }
}
