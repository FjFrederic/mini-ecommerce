<?php

namespace App\Controller\ViewModel;

use Core\BusinessModel\Order;
use Core\Exception\CouldNotFetchException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FetchOrder extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * @return array
     */
    public function load(): array
    {
        try {
            return $this->getEntityManager()
                        ->getRepository(Order::class)
                        ->findAll();
        } catch (\Exception $error) {
            throw new CouldNotFetchException($error->getMessage(), $error->getCode(), $error);
        }
    }
}