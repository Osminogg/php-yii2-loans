<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\src\Presentation\Form\ClientForm */

$this->title = 'Create Client';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>