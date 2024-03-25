<?php

namespace Core\BusinessModel;

class Order
{
    public ?int $id = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $email = null;
    public ?string $address = null;
    public ?array $cart = [];

    /**
     * @param ?int $id
     * @param ?string $firstname
     * @param ?string $lastname
     * @param ?string $email
     * @param ?string $address
     * @param ?array $cart
     */
    public function __construct(
        ?int $id,
        ?string $firstname,
        ?string $lastname,
        ?string $email,
        ?string $address,
        ?array $cart
    ){
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->address = $address;
        $this->cart = $cart;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): Order
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): Order
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): Order
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): Order
    {
        $this->address = $address;

        return $this;
    }

    public function getCart(): ?array
    {
        return $this->cart;
    }

    public function setCart(?array $cart): Order
    {
        $this->cart = $cart;

        return $this;
    }
}
