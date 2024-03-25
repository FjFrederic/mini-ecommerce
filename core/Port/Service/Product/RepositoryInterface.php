<?php

namespace Core\Port\Service\Product;

interface RepositoryInterface
{

     /**
     * @return array
     */
    public function fetchFromApi(): array;
}
