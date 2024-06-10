<?php

namespace app\src\Domain\Repository;

use app\src\Domain\Model\Client\Client;

interface ClientRepositoryInterface
{
    public function find($id): ?Client;
    public function save(Client $client): void;
    public function findAll(): array;
}