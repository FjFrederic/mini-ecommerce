<?php

namespace Core\UseCase\Order\Commands;

use Core\BusinessModel\Order;
use Core\UseCase\Order\Commands\CreateOrderCommand as InputDTO;
use Core\Port\Service\Order\RepositoryInterface;
use Core\Exception\BusinessModel\CouldNotSaveException;

class CreateOrderCommandHandler
{
    private RepositoryInterface $orderRepository;

    /**
     * @param RepositoryInterface $orderRepository
     */
    public function __construct(RepositoryInterface $orderRepository)
    {
      $this->orderRepository = $orderRepository;
    }

    /**
     * @param InputDTO $inputDTO
     * @return OutputDTO
     */
    public function execute(InputDTO $inputDTO):OutputDTO
    {
        $isSuccess = true;
        try {
            $order = new Order(
                null,
                $inputDTO->firstname,
                $inputDTO->lastname,
                $inputDTO->email,
                $inputDTO->address,
                $inputDTO->cart,
            );

            $this->orderRepository->saveOrder($order);

        } catch (\Throwable $error) {
            $isSuccess = false;
            throw new CouldNotSaveException($error->getMessage(), $error->getCode(), $error);
        }

        return new OutputDTO($isSuccess);
    }
}