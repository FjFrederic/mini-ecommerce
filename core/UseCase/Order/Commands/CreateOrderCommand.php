<?php

namespace Core\UseCase\Order\Commands;

class CreateOrderCommand
{
    /**
     * @var string
     */
    public string $firstname;
    /**
     * @var string
     */
    public string $lastname;
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $address;
    /**
     * @var array|null
     */
    public ?array $cart;

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $address
     * @param ?array $cart
     */
    public function __construct(
        string $firstname,
        string $lastname,
        string $email,
        string $address,
        ?array $cart
    ){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->address = $address;
        $this->cart = $cart;
    }
}
