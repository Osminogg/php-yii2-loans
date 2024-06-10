<?php

namespace app\src\Domain\Repository;

use app\src\Domain\Model\Sale\Sale;

interface SaleRepositoryInterface
{
    public function save(Sale $sale): void;
}