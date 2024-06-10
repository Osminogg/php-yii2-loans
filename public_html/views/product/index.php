<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

/* @var $products app\src\Domain\Model\Product\Product[] */

$this->title = 'Product List';
?>

<h1><?= $this->title ?></h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Term</th>
        <th>Interest Rate</th>
        <th>Sum</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getTerm() ?></td>
            <td><?= $product->getInterestRate() ?></td>
            <td><?= $product->getSum() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-success" href="<?= Url::toRoute(['product/create']) ?>">Create</a>