<?php

namespace app\src\Domain\Model\Product;

use app\src\Application\DTO\ProductDTO;

class Product
{
    private $id;
    private $name;
    private $term;
    private $interestRate;
    private $sum;

    public function __construct(ProductDTO $dto)
    {
        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->term = $dto->term;
        $this->interestRate = $dto->interestRate;
        $this->sum = $dto->sum;
    }

    // Getters and setters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getTerm() { return $this->term; }
    public function getInterestRate() { return $this->interestRate; }
    public function getSum() { return $this->sum; }
}