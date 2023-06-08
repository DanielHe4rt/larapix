<?php

namespace DanielHe4rt\Larapix\Charges\Contracts;

use DanielHe4rt\Larapix\Charges\Charge;

interface ChargeContract
{
    public function findById(string $id): array;

    public function findAll(array $params = []): array;

    public function create(Charge $charge): array;
}
