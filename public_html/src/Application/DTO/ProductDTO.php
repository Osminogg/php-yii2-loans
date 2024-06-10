<?php

namespace app\src\Application\DTO;

class ProductDTO
{
    public $id;
    public $name;
    public $term;
    public $interestRate;
    public $sum;

    public function __construct($id, $name, $term, $interestRate, $sum)
    {
        $this->id = $id;
        $this->name = $name;
        $this->term = $term;
        $this->interestRate = $interestRate;
        $this->sum = $sum;
    }
}