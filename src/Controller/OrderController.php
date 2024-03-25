<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Core\UseCase\Order\Commands\CreateOrderCommandHandler as CreatOrderUseCase;
use Core\UseCase\Order\Commands\CreateOrderCommand as InputDTO;
use Core\UseCase\Order\FetchOrderQuery as Query;
use App\Controller\ViewModel\FetchOrder as FetchCartViewModel;

#[Route('/api')]
class OrderController extends AbstractController
{
    #[Route('/order/add', name: 'add_order')]
    public function saveOrder(
        Request $request,
        CreatOrderUseCase $creatOrderUseCase
    ): JsonResponse {
        $requestData = json_decode($request->getContent(), true);

        try {

            $input = new InputDTO(
                $requestData['firstname'],
                $requestData['lastname'],
                $requestData['email'],
                $requestData['address'],
                $requestData['cart'],
            );

            $output = $creatOrderUseCase->execute($input);
            $response = new JsonResponse(
                $output,
                Response::HTTP_OK
            );
        } catch (\Throwable $error) {
            $response = new JsonResponse(
                json_decode($error->getMessage(), true),
                Response::HTTP_BAD_REQUEST
            );
        }
        return $response;
    }

    #[Route('/order/fetch', name: 'fetch_order')]
    public function fetchOrder(FetchCartViewModel $fetchCartViewModel): JsonResponse 
    {
        try {
            $output = $fetchCartViewModel->load();
            $response = new JsonResponse(
                $output,
                Response::HTTP_OK
            );

        } catch (\Throwable $error) {
            $response = new JsonResponse(
                json_decode($error->getMessage(), true),
                Response::HTTP_BAD_REQUEST
            );
        }
        return $response;
    }
}
