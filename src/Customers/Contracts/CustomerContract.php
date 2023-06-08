<?php

namespace DanielHe4rt\Larapix\Customers\Contracts;

use DanielHe4rt\Larapix\Customers\Customer;

interface CustomerContract
{
    public function findById(string $id): array;

    public function findAll(array $params = []): array;

    public function create(Customer $customer): array;
}
