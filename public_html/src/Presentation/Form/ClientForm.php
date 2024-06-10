<?php

namespace app\src\Presentation\Form;

use yii\base\Model;

/**
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
class ClientForm extends Model
{
    public $firstName;
    public $lastName;
    public $age;
    public $email;
    public $phone;
    public $addressCity;
    public $addressState;
    public $addressZip;
    public $ssn;
    public $fico;
    public $income;

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