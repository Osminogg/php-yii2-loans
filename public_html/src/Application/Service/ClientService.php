<?php

namespace app\src\Application\Service;

use app\src\Application\DTO\ClientDTO;
use app\src\Domain\Repository\ClientRepositoryInterface;
use app\src\Domain\Model\Client\Client;

class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function createClient(ClientDTO $dto)
    {
        $client = new Client($dto);
        $this->clientRepository->save($client);
    }

    public function updateClient(ClientDTO $dto)
    {
        $client = new Client($dto);
        $this->clientRepository->save($client);
    }

    public function getClient($id)
    {
        return $this->clientRepository->find($id);
    }

    public function getAllClients()
    {
        return $this->clientRepository->findAll();
    }
}