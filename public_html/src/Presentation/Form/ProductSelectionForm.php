<?php

namespace app\src\Presentation\Form;

use yii\base\Model;

class ProductSelectionForm extends Model
{
    public $clientId;
    public $productId;

    public function rules()
    {
        return [
            [['clientId', 'productId'], 'required'],
            [['clientId', 'productId'], 'integer'],
        ];
    }
}