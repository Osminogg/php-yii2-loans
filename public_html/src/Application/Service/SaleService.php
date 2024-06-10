<?php

namespace app\src\Application\Service;

use app\src\Domain\Event\SaleEvent;
use app\src\Domain\Model\Client\Client;
use app\src\Domain\Model\Product\Product;
use app\src\Domain\Model\Sale\Sale;
use app\src\Domain\Repository\ClientRepositoryInterface;
use app\src\Domain\Repository\ProductRepositoryInterface;
use app\src\Domain\Repository\SaleRepositoryInterface;
use Yii;

class SaleService
{
    private $clientRepository;
    private $productRepository;
    private $saleRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        ProductRepositoryInterface $productRepository,
        SaleRepositoryInterface $saleRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->productRepository = $productRepository;
        $this->saleRepository = $saleRepository;
    }

    public function sellProductToClient($clientId, $productId): bool
    {
        $client = $this->clientRepository->find($clientId);
        $product = $this->productRepository->find($productId);

        if (!$client || !$product) {
            return false;
        }

        if (!$this->canSellProduct($client)) {
            return false;
        }

        // high rate for CA
        $rate = $product->getInterestRate();
        if($client->getAddressState() === 'CA') {
            $rate += 11.49;
        }

        $sale = new Sale(null, $client->getId(), $product->getId(), $rate, new \DateTime());
        $this->saleRepository->save($sale);

        // Trigger event
        $event = new SaleEvent($sale);
        Yii::$app->eventManager->trigger(SaleEvent::EVENT_NAME, $event);

        return true;
    }

    public function canSellProduct(Client $client): bool
    {
        // check age
        if ($client->getAge() < 18 || $client->getAge() > 60) {
            return false;
        }

        // check fico
        if ($client->getFico() < 500) {
            return false;
        }

        // check income
        if ($client->getIncome() < 1000) {
            return false;
        }

        // check state
        if (!in_array($client->getAddressState(), ['CA', 'NY', 'NV'])) {
            return false;
        }

        // random break
        if ($client->getAddressState() === 'NY' && rand(0, 1) === 0) {
            return false;
        }

        return true;
    }
}