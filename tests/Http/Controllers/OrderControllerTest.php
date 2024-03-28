<?php

namespace App\Tests\Http\Controllers;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\OrderController;
use Core\UseCase\Order\Commands\CreateOrderCommandHandler as CreatOrderUseCase;
use App\Controller\ViewModel\FetchOrder as FetchCartViewModel;
use Core\Port\Service\Order\RepositoryInterface;
use Faker\Factory;

class OrderControllerTest extends KernelTestCase
{
    private OrderController $orderController;
    private CreatOrderUseCase $creatOrderUseCase;
    private FetchCartViewModel $fetchCartViewModel;
    const HTTP_OK = 200;

    public function setUp(): void
    {
        $orderRepository = static::getContainer()->get(RepositoryInterface::class);
        $this->fetchCartViewModel = static::getContainer()->get(FetchCartViewModel::class);
        $this->creatOrderUseCase = new CreatOrderUseCase($orderRepository);
        $this->orderController = new OrderController();
    }

    public function testSaveOrder(): void
    {
        $faker = Factory::create();
        $data = [
            'firstname' => $faker->firstName,
            'lastname' =>  $faker->lastName,
            'email' =>  $faker->email,
            'address' =>  $faker->address,
            'cart' => [
                "quantity" =>  $faker->numberBetween(1, 20),
                "product_name" => $faker->word
            ]
        ];

        // Create a new Request object with the given data
        $request = new Request([], [], [], [], [], [], json_encode($data));
        $response = $this->orderController->saveOrder($request, $this->creatOrderUseCase);
        // Assert that the data is successfully saved
        $this->assertSame(self::HTTP_OK, 200);
    }

    public function testFetchOrder(): void
    {
        $response = $this->orderController->fetchOrder($this->fetchCartViewModel);
        $this->assertSame(self::HTTP_OK, $response->getStatusCode());
    }
}
