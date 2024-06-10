<?php

namespace app\src\Domain\Repository;

use app\src\Domain\Model\Product\Product;

interface ProductRepositoryInterface
{
    public function find($id): ?Product;
    public function save(Product $product): void;
    public function findAll(): array;
}