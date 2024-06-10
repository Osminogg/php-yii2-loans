<?php

namespace app\src\Domain\Model\Client;

use app\src\Application\DTO\ClientDTO;

class Client
{
    private $id;
    private $firstName;
    private $lastName;
    private $age;
    private $addressCity;
    private $addressState;
    private $addressZip;
    private $ssn;
    private $fico;
    private $email;
    private $phone;
    private $income;

    public function __construct(ClientDTO $dto)
    {
        $this->id = $dto->id;
        $this->firstName = $dto->firstName;
        $this->lastName = $dto->lastName;
        $this->age = $dto->age;
        $this->addressCity = $dto->addressCity;
        $this->addressState = $dto->addressState;
        $this->addressZip = $dto->addressZip;
        $this->ssn = $dto->ssn;
        $this->fico = $dto->fico;
        $this->email = $dto->email;
        $this->phone = $dto->phone;
        $this->income = $dto->income;
    }

    // Getters and setters
    public function getId() { return $this->id; }
    public function getFirstName() { return $this->firstName; }
    public function getLastName() { return $this->lastName; }
    public function getAge() { return $this->age; }
    public function getAddressCity() { return $this->addressCity; }
    public function getAddressState() { return $this->addressState; }
    public function getAddressZip() { return $this->addressZip; }
    public function getSsn() { return $this->ssn; }
    public function getFico() { return $this->fico; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getIncome() { return $this->income; }
}