<?php

namespace DanielHe4rt\Larapix\Refunds\Contracts;

use DanielHe4rt\Larapix\Refunds\Refund;

interface RefundsContract
{
    public function findById(string $refundId): array;

    public function findAll(array $parameters = []): array;

    public function create(Refund $refund): array;
}
