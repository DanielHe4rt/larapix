<?php

namespace DanielHe4rt\Larapix\Transactions\Contracts;

interface TransactionContract
{
    public function findById(string $transactionId): array;

    public function findAll(array $parameters = []): array;
}
