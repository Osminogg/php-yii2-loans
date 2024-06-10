<?php

namespace app\src\Application\EventHandler;

use app\src\Application\Service\ClientService;
use app\src\Application\Service\ProductService;
use app\src\Domain\Event\SaleEvent;
use app\src\Domain\Model\Product\Product;
use Yii;

class SaleEventHandler
{
    private $clientService;
    private $productService;

    public function __construct(ClientService $clientService, ProductService $productService)
    {
        $this->clientService = $clientService;
        $this->productService = $productService;
    }

    public function handle(SaleEvent $event)
    {
        $sale = $event->getSale();
        $client = $this->clientService->getClient($sale->getClientId());
        $product = $this->productService->getProduct($sale->getProductId());

        Yii::$app->mailer->compose()
            ->setTo($client->getEmail())
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
            ->setSubject('Purchase Confirmation')
            ->setTextBody("Congratulations {$client->getFirstName()}! Your loan application {$product->getName()} has been completed.")
            ->send();
    }
}