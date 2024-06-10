<?php

namespace app\src\Infrastructure\Persistence;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property float $term
 * @property float $sum
 * @property float $interestRate
 */
class ProductAR extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['name', 'term', 'sum', 'interestRate'], 'required'],
            [['sum', 'interestRate'], 'number'],
            [['term'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}