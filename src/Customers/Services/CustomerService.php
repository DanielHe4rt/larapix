<?php

namespace DanielHe4rt\Larapix\Customers\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use DanielHe4rt\Larapix\Core\Services\BaseService;
use DanielHe4rt\Larapix\Customers\Contracts\CustomerContract;
use DanielHe4rt\Larapix\Customers\Customer;
use DanielHe4rt\Larapix\Customers\Exceptions\CustomerNotFoundException;

class CustomerService extends BaseService implements CustomerContract
{
    const BASE_API = 'https://api.openpix.com.br/api/openpix/v1';

    public function __construct(private readonly Client $client)
    {
    }

    public function findById(string $id): array
    {
        $uri = sprintf(self::BASE_API . '/customer/%s', $id);
        try {
            $response = $this->client->get($uri);
        } catch (ClientException $exception) {
            throw new CustomerNotFoundException(
                json_encode(['error' => 'Customer not found']),
                404
            );
        }

        return $this->success($response->getBody());
    }

    public function findAll(array $params = []): array
    {
        $uri = self::BASE_API . '/customer';
        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }

    public function create(Customer $customer): array
    {
        $uri = self::BASE_API . '/customer';

        $response = $this->client->post($uri, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($customer)
        ]);

        return $this->success($response->getBody());
    }
}
