<?php

namespace app\src\Domain\Model\Sale;

class Sale
{
    private $id;
    private $clientId;
    private $productId;
    private $rate;
    private $date;

    public function __construct($id, $clientId, $productId, $rate, \DateTime $date)
    {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->productId = $productId;
        $this->rate = $rate;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }
}