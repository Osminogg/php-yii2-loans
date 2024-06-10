<?php

namespace app\src\Presentation\Controller;

use app\src\Application\DTO\ClientDTO;
use app\src\Presentation\Form\ClientForm;
use app\src\Presentation\Form\ProductSelectionForm;
use Yii;
use yii\web\Controller;
use app\src\Application\Service\ClientService;
use app\src\Application\Service\ProductService;
use app\src\Application\Service\SaleService;

class ClientController extends Controller
{
    private $clientService;
    private $productService;
    private $saleService;

    public function __construct($id, $module, ClientService $clientService, ProductService $productService, SaleService $saleService, $config = [])
    {
        $this->clientService = $clientService;
        $this->productService = $productService;
        $this->saleService = $saleService;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $model = new ClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dto = new ClientDTO(
                null,
                $model->firstName,
                $model->lastName,
                $model->age,
                $model->addressCity,
                $model->addressState,
                $model->addressZip,
                $model->ssn,
                $model->fico,
                $model->email,
                $model->phone,
                $model->income
            );

            $this->clientService->createClient($dto);

            Yii::$app->session->setFlash('success', 'Client created successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $clients = $this->clientService->getAllClients();
        return $this->render('index', ['clients' => $clients]);
    }

    public function actionView($id)
    {
        $client = $this->clientService->getClient($id);
        return $this->render('view', ['client' => $client]);
    }

    public function actionUpdate($id)
    {
        $client = $this->clientService->getClient($id);
        $model = new ClientForm();
        $model->setAttributes([
            'firstName' => $client->getFirstName(),
            'lastName' => $client->getLastName(),
            'age' => $client->getAge(),
            'addressCity' => $client->getAddressCity(),
            'addressState' => $client->getAddressState(),
            'addressZip' => $client->getAddressZip(),
            'ssn' => $client->getSsn(),
            'fico' => $client->getFico(),
            'email' => $client->getEmail(),
            'phone' => $client->getPhone(),
            'income' => $client->getIncome(),
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dto = new ClientDTO(
                $id,
                $model->firstName,
                $model->lastName,
                $model->age,
                $model->addressCity,
                $model->addressState,
                $model->addressZip,
                $model->ssn,
                $model->fico,
                $model->email,
                $model->phone,
                $model->income
            );
            $this->clientService->updateClient($dto);

            Yii::$app->session->setFlash('success', 'Client updated successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'client' => $client,
        ]);
    }

    public function actionCheckIssueLoan($id)
    {
        $client = $this->clientService->getClient($id);
        if($this->saleService->canSellProduct($client)) {
            Yii::$app->session->setFlash('success', 'Client can receive the product.');
        } else {
            Yii::$app->session->setFlash('danger', 'Cannot sell product to this client.');
        }
        return $this->redirect(['index']);
    }

    public function actionSellProduct($id)
    {
        $client = $this->clientService->getClient($id);
        $model = new ProductSelectionForm();
        $model->clientId = $id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($this->saleService->sellProductToClient($id, $model->productId)) {
                Yii::$app->session->setFlash('success', 'Product sold successfully.');
            } else {
                Yii::$app->session->setFlash('error', 'Cannot sell product to this client.');
            }

            return $this->redirect(['index']);
        }

        $products = $this->productService->getProductOptions();

        return $this->render('sell', [
            'model' => $model,
            'client' => $client,
            'products' => $products,
        ]);
    }
}