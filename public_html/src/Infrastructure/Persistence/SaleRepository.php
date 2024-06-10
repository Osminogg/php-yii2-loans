<?php

namespace app\src\Infrastructure\Persistence;

use app\src\Domain\Repository\SaleRepositoryInterface;
use app\src\Domain\Model\Sale\Sale;

class SaleRepository implements SaleRepositoryInterface
{
    public function save(Sale $sale): void
    {
        $record = SaleAR::findOne($sale->getId()) ?? new SaleAR();
        $record->client_id = $sale->getClientId();
        $record->product_id = $sale->getProductId();
        $record->rate = $sale->getRate();
        $record->date = $sale->getDate()->format('Y-m-d H:i:s');
        $record->save();
    }
}