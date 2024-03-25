<?php

namespace Core\BusinessModel;

class Product
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string|null
     */
    private ?string $title;
    /**
     * @var float|string
     */
    private float $price;
    /**
     * @var string|null
     */
    private ?string $description;
    /**
     * @var int|string
     */
    private int $category;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var array|string|null
     */
    private ?array $rating;

    /**
     * @param int $id
     * @param ?string $title
     * @param string $price
     * @param ?string $description
     * @param string $category
     * @param string $image
     * @param ?string $rating
     */
    public function __construct(
        int $id,
        ?string $title,
        float $price,
        ?string $description,
        string $category,
        string $image,
        ?array $rating
    ){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->image = $image;
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTitle(): int
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return Product
     */
    public function setPrice(string $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Product
     */
    public function setCategory(string $category): Product
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Product
     */
    public function setImage(string $image): Product
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Product
     */
    public function setRating(string $rating): Product
    {
        $this->rating = $rating;
        return $this;
    }
}
