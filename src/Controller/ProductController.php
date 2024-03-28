<?php

namespace App\Controller;

use Core\UseCase\Product\Query\FetchProductFromAPIQuery as FetchProductUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
class ProductController extends AbstractController
{
    /**
     * @param FetchProductUseCase $fetchProductUseCase
     * @return JsonResponse
     */
    #[Route('/product', name: 'product')]
    public function fetchProduct(
        FetchProductUseCase $fetchProductUseCase
    ): JsonResponse {
        try {
            $output = $fetchProductUseCase->execute();
            $response = new JsonResponse(
                $output,
                Response::HTTP_OK,
            );
        } catch (\Throwable $throwable) {
            $response = new JsonResponse(
                json_decode($throwable->getMessage(), true),
                Response::HTTP_BAD_REQUEST
            );
        }
        return $response;
    }
}
