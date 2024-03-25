<?php

namespace Core\UseCase\Order\Commands;

class OutputDTO
{
    public bool $success;

    /**
     * @param bool $success
     */
    public function __construct(bool $success)
    {
        $this->success = $success;
    }
}