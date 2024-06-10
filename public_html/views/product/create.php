<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\src\Presentation\Form\ProductForm */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'term')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'interestRate')->textInput() ?>
    <?= $form->field($model, 'sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>