<?php

namespace app\src\Infrastructure\Persistence;

use yii\db\ActiveRecord;

/**
 * @property int $client_id
 * @property int $product_id
 * @property float $rate
 * @property string $date
 */
class SaleAR extends ActiveRecord
{
    public static function tableName()
    {
        return 'sales';
    }

    public function rules()
    {
        return [
            [['client_id', 'product_id', 'date', 'rate'], 'required'],
            [['client_id', 'product_id'], 'integer'],
            [['rate'], 'number'],
            [['date'], 'safe'],
        ];
    }
}