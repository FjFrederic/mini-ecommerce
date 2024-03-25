<?php

namespace App\Adapter\Service\Order;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Core\BusinessModel\Order;
use Core\Exception\CouldNotSaveException;
use Core\Port\Service\Order\RepositoryInterface;

class Repository extends ServiceEntityRepository implements RepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * @param Order $entity
     * @return void
     * @throws CouldNotSaveException
     */
    public function saveOrder(Order $entity): void
    {
        try {
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
        } catch (\Exception $error) {
            throw new CouldNotSaveException($error->getMessage(),$error->getCode(),$error);
        }
    }
}
