<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\src\Presentation\Form\ClientForm */
/* @var $client app\src\Domain\Model\Client\Client */

$this->title = 'Update Client: ' . $client->getFirstName() . ' ' . $client->getLastName();
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $client->getFirstName() . ' ' . $client->getLastName(), 'url' => ['view', 'id' => $client->getId()]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>