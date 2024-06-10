<?php

namespace app\src\Presentation\Controller;

use app\src\Application\DTO\ProductDTO;
use app\src\Presentation\Form\ProductForm;
use Yii;
use yii\web\Controller;
use app\src\Application\Service\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct($id, $module, ProductService $productService, $config = [])
    {
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    public function actionCreate()
    {
        $model = new ProductForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $dto = new ProductDTO(null, $model->name, $model->term, $model->interestRate, $model->sum);
            $this->productService->createProduct($dto);

            Yii::$app->session->setFlash('success', 'Product created successfully.');
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $products = $this->productService->getAllProducts();
        return $this->render('index', ['products' => $products]);
    }
}