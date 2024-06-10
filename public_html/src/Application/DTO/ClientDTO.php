<?php

namespace app\src\Application\DTO;

class ClientDTO
{
    public $id;
    public $firstName;
    public $lastName;
    public $age;
    public $addressCity;
    public $addressState;
    public $addressZip;
    public $ssn;
    public $fico;
    public $email;
    public $phone;
    public $income;

    public function __construct($id, $firstName, $lastName, $age, $addressCity, $addressState, $addressZip, $ssn, $fico, $email, $phone, $income)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->addressCity = $addressCity;
        $this->addressState = $addressState;
        $this->addressZip = $addressZip;
        $this->ssn = $ssn;
        $this->fico = $fico;
        $this->email = $email;
        $this->phone = $phone;
        $this->income = $income;
    }
}