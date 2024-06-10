<?php

namespace app\src\Infrastructure\Persistence;

use app\src\Application\DTO\ProductDTO;
use app\src\Domain\Model\Product\Product;
use app\src\Domain\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function find($id): ?Product
    {
        $record = ProductAR::findOne($id);
        $dto = new ProductDTO($record->id, $record->name, $record->term, $record->interestRate, $record->sum);
        return new Product($dto);
    }

    public function save(Product $product): void
    {
        $record = ProductAR::findOne($product->getId()) ?? new ProductAR();
        $record->id = $product->getId();
        $record->name = $product->getName();
        $record->term = $product->getTerm();
        $record->interestRate = $product->getInterestRate();
        $record->sum = $product->getSum();
        $record->save();
    }

    public function findAll(): array
    {
        $records = ProductAR::find()->all();
        $products = [];
        foreach ($records as $record) {
            $dto = new ProductDTO($record->id, $record->name, $record->term, $record->interestRate, $record->sum);
            $products[] = new Product($dto);
        }
        return $products;
    }
}