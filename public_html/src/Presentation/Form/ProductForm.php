<?php

namespace app\src\Presentation\Form;

use yii\base\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $term
 * @property float $sum
 * @property float $interestRate
 */
class ProductForm extends Model
{
    public $name;
    public $term;
    public $sum;
    public $interestRate;

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