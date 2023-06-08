<?php

namespace DanielHe4rt\Larapix\Transactions\Services;

use GuzzleHttp\Client;
use DanielHe4rt\Larapix\Core\Services\BaseService;
use DanielHe4rt\Larapix\Transactions\Contracts\TransactionContract;

class TransactionsService extends BaseService implements TransactionContract
{
    const BASE_API = 'https://api.openpix.com.br/api/openpix/v1';

    public function __construct(private readonly Client $client)
    {
    }

    public function findById(string $transactionId): array
    {
        $uri = sprintf(
            self::BASE_API . '/transaction/%s',
            $transactionId
        );
        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }

    public function findAll(array $parameters = []): array
    {
        $uri = self::BASE_API . '/refund';

        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }
}
