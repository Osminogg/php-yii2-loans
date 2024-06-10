<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

/* @var $clients app\src\Domain\Model\Client\Client[] */

$this->title = 'Client List';
?>

<h1><?= $this->title ?></h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>State</th>
        <th>FICO</th>
        <th>SSN</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client->getId() ?></td>
            <td><?= $client->getFirstName() ?></td>
            <td><?= $client->getLastName() ?></td>
            <td><?= $client->getAddressState() ?></td>
            <td><?= $client->getFico() ?></td>
            <td><?= $client->getSsn() ?></td>
            <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['client/update', 'id' => $client->getId()]) ?>">Update</a>
                <a class="btn btn-warning" href="<?= Url::toRoute(['client/check-issue-loan', 'id' => $client->getId()]) ?>">Check</a>
                <a class="btn btn-primary" href="<?= Url::toRoute(['client/sell-product', 'id' => $client->getId()]) ?>">Issue</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-success" href="<?= Url::toRoute(['client/create']) ?>">Create</a>