<?php

namespace app\src\Application\Service;

use app\src\Application\DTO\ProductDTO;
use app\src\Domain\Repository\ProductRepositoryInterface;
use app\src\Domain\Model\Product\Product;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(ProductDTO $dto)
    {
        $product = new Product($dto);
        $this->productRepository->save($product);
    }

    public function getProduct($id)
    {
        return $this->productRepository->find($id);
    }

    public function getAllProducts()
    {
        return $this->productRepository->findAll();
    }

    public function getProductOptions()
    {
        $products = $this->productRepository->findAll();
        $productOptions = [];

        foreach ($products as $product) {
            $productOptions[$product->getId()] = $product->getName();
        }

        return $productOptions;
    }
}