<?php

namespace app\src\Infrastructure\Persistence;

use app\src\Application\DTO\ClientDTO;
use app\src\Domain\Model\Client\Client;
use app\src\Domain\Repository\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{

    public function find($id): ?Client
    {
        $record = ClientAR::findOne($id);
        $dto = new ClientDTO(
            $record->id,
            $record->firstName,
            $record->lastName,
            $record->age,
            $record->addressCity,
            $record->addressState,
            $record->addressZip,
            $record->ssn,
            $record->fico,
            $record->email,
            $record->phone,
            $record->income
        );
        return new Client($dto);
    }

    public function save(Client $client): void
    {
        $record = ClientAR::findOne($client->getId()) ?? new ClientAR();
        $record->id = $client->getId();
        $record->firstName = $client->getFirstName();
        $record->lastName = $client->getLastName();
        $record->age = $client->getAge();
        $record->addressCity = $client->getAddressCity();
        $record->addressState = $client->getAddressState();
        $record->addressZip = $client->getAddressZip();
        $record->ssn = $client->getSsn();
        $record->fico = $client->getFico();
        $record->email = $client->getEmail();
        $record->phone = $client->getPhone();
        $record->income = $client->getIncome();
        $record->save();
    }

    public function findAll(): array
    {
        $records = ClientAR::find()->all();
        $products = [];
        foreach ($records as $record) {
            $dto = new ClientDTO(
                $record->id,
                $record->firstName,
                $record->lastName,
                $record->age,
                $record->addressCity,
                $record->addressState,
                $record->addressZip,
                $record->ssn,
                $record->fico,
                $record->email,
                $record->phone,
                $record->income
            );
            $products[] = new Client($dto);
        }
        return $products;
    }
}