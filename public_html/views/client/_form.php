<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\src\Presentation\Form\ClientForm */

?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'age')->textInput() ?>
    <?= $form->field($model, 'addressCity')->textInput() ?>
    <?= $form->field($model, 'addressState')->textInput() ?>
    <?= $form->field($model, 'addressZip')->textInput() ?>
    <?= $form->field($model, 'ssn')->textInput() ?>
    <?= $form->field($model, 'fico')->textInput() ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>