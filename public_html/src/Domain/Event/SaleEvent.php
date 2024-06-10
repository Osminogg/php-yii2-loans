<?php

namespace app\src\Domain\Event;

use app\src\Domain\Model\Sale\Sale;
use yii\base\Event;

class SaleEvent extends Event
{
    const EVENT_NAME = 'sale.event';

    private $sale;

    public function __construct(Sale $sale, $config = [])
    {
        $this->sale = $sale;
        parent::__construct($config);
    }

    public function getSale(): Sale
    {
        return $this->sale;
    }
}