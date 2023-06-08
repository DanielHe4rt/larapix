<?php

namespace DanielHe4rt\Larapix\Refunds\Services;

use GuzzleHttp\Client;
use DanielHe4rt\Larapix\Core\Services\BaseService;
use DanielHe4rt\Larapix\Refunds\Contracts\RefundsContract;
use DanielHe4rt\Larapix\Refunds\Refund;

class RefundsService extends BaseService implements RefundsContract
{
    const BASE_API = 'https://api.openpix.com.br/api/openpix/v1';

    public function __construct(private readonly Client $client)
    {
    }


    public function findById(string $refundId): array
    {
        $uri = sprintf(self::BASE_API . '/refund/%s', $refundId);

        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }

    public function findAll(array $parameters = []): array
    {
        $uri = self::BASE_API . '/refund';

        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }

    public function create(Refund $refund): array
    {

        $uri = self::BASE_API . '/refund';
        $response = $this->client->post($uri, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($refund)
        ]);
        // TODO: decide how to differentiate any type of error

        return $this->success($response->getBody());
    }
}
