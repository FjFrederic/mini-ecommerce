<?php

namespace Core\Port\Service\Order;

use Core\BusinessModel\Order;

interface RepositoryInterface
{
     /**
     * @param Order $order
     * @return void
     */
    public function saveOrder(Order $order): void;
}
