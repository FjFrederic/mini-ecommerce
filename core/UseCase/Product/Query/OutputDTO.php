<?php

namespace Core\UseCase\Product\Query;

use Core\BusinessModel\Product;

class OutputDTO
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
     * @param Product $productDomain
     */
    public function __construct(Product $productDomain)
    {
        $this->id = $productDomain->getId();
        $this->title = $productDomain->getTitle();
        $this->price = $productDomain->getPrice();
        $this->description = $productDomain->getDescription();
        $this->category = $productDomain->getCategory();
        $this->image = $productDomain->getImage();
        $this->rating = $productDomain->getRating();
    }
}
