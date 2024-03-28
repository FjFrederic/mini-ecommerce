<?php

namespace App\Tests\Core\UseCase\Product;

use App\Controller\ProductController;
use Core\Port\Service\Product\RepositoryInterface;
use Core\UseCase\Product\Query\FetchProductFromAPIQuery;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FetchProductFromApiTest extends KernelTestCase
{
    protected RepositoryInterface $productRepository;
    protected FetchProductFromAPIQuery $fetchProductFromAPIUseCase;
    protected ProductController $fetchProductFromAPICtrl;

    const HTTP_OK = 200;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        // Get the container
        $container = $kernel->getContainer();
        // Get the repository interface
        $this->productRepository = $container->get(RepositoryInterface::class);
        $this->fetchProductFromAPIUseCase = new FetchProductFromAPIQuery($this->productRepository);
    }

    public function testExecute(): void
    {
        $response = $this->fetchProductFromAPIUseCase->execute();
        // Assert that the fetched data is an array
        $this->assertIsArray($response);
    }
}
