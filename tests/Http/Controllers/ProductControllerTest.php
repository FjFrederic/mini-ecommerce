<?php

namespace App\Tests\Http\Controllers;

use App\Controller\ProductController;
use Core\Port\Service\Product\RepositoryInterface;
use Core\UseCase\Product\Query\FetchProductFromAPIQuery;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductControllerTest extends KernelTestCase
{
    protected FetchProductFromAPIQuery $fetchProductFromAPIUseCase;
    protected ProductController $productCotroller;

    const HTTP_OK = 200;

    public function setUp(): void
    {
        $productRepository = static::getContainer()->get(RepositoryInterface::class);
        $this->fetchProductFromAPIUseCase = new FetchProductFromAPIQuery($productRepository);
        $this->productCotroller = new ProductController();
    }

    public function testExecute(): void
    {
        $response = $this->productCotroller->fetchProduct($this->fetchProductFromAPIUseCase);
        // Assert that the data is fetched successfully
        $this->assertSame(self::HTTP_OK, $response->getStatusCode());
    }
}
