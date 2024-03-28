<?php

namespace Core\UseCase\Order\Query;

use Core\BusinessModel\Order as OutputTDO;
use Core\Port\Service\Order\RepositoryInterface;
use Core\Exception\CouldNotSaveException;

class FetchOrderQueryHandler
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
     * @return void
     */
    public function execute():void
    {
        try {
            $order = new FetchOrderQuery();
            //$this->orderRepository->saveOrder($order);
        } catch (\Throwable $error) {
            throw new CouldNotSaveException($error->getMessage(), $error->getCode(), $error);
        }
    }
}
