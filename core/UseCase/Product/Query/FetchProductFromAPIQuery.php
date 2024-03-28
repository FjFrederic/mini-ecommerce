<?php

namespace Core\UseCase\Product\Query;

use Core\Port\Service\Product\RepositoryInterface;

class FetchProductFromAPIQuery
{
    private RepositoryInterface $productRepository;

    /**
     * @param RepositoryInterface $productRepository
     */
    public function __construct(RepositoryInterface $productRepository)
    {
      $this->productRepository = $productRepository;
    }

    /**
     * @return array
     */
    public function execute():array
    {
        return $this->productRepository->fetchFromApi();
    }
}
