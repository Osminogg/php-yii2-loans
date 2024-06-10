<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\src\Presentation\Form\ProductSelectionForm */
/* @var $client app\src\Domain\Model\Client\Client */
/* @var $products array */

$this->title = 'Select Product to ' . $client->getFirstName() . ' ' . $client->getLastName();
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $client->getFirstName() . ' ' . $client->getLastName(), 'url' => ['view', 'id' => $client->getId()]];
$this->params['breadcrumbs'][] = 'Sell Product';
?>

<div class="product-sell">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productId')->dropDownList($products, ['prompt' => 'Select a product']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>