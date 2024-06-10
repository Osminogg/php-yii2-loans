<?php

namespace app\src\Infrastructure\Persistence;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $age
 * @property string $email
 * @property int $phone
 * @property string $addressCity
 * @property string $addressState
 * @property string $addressZip
 * @property int $ssn
 * @property int $fico
 * @property float $income
 */
class ClientAR extends ActiveRecord
{
    public static function tableName()
    {
        return 'clients';
    }

    public function rules()
    {
        return [
            [['firstName', 'lastName', 'age', 'email', 'phone', 'addressCity', 'addressState', 'addressZip', 'ssn', 'fico', 'income'], 'required'],
            [['age', 'phone', 'ssn', 'fico'], 'integer'],
            [['income'], 'number'],
            [['email'], 'email'],
            [['firstName', 'lastName', 'addressCity', 'addressState', 'addressZip'], 'string', 'max' => 255],
        ];
    }
}