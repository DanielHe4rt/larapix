<?php

namespace DanielHe4rt\Larapix\Charges\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use DanielHe4rt\Larapix\Charges\Charge;
use DanielHe4rt\Larapix\Charges\Contracts\ChargeContract;
use DanielHe4rt\Larapix\Charges\Exceptions\ChargeAlreadyCreatedException;
use DanielHe4rt\Larapix\Charges\Exceptions\ChargeNotFoundException;
use DanielHe4rt\Larapix\Core\Services\BaseService;

class ChargeService extends BaseService implements ChargeContract
{
    const BASE_API = 'https://api.openpix.com.br/api/openpix/v1';

    public function __construct(private readonly Client $client)
    {
    }


    public function findById(string $id): array
    {
        $uri = sprintf(self::BASE_API . '/charge/%s', $id);
        try {
            $response = $this->client->get($uri);
        } catch (ClientException $exception) {
            throw new ChargeNotFoundException(
                json_encode(['error' => 'Charge not found']),
                404
            );
        }

        return $this->success($response->getBody());
    }

    public function findAll(array $params = []): array
    {
        $uri = self::BASE_API . '/charge';
        $response = $this->client->get($uri);

        return $this->success($response->getBody());
    }

    public function create(Charge $charge): array
    {
        $uri = self::BASE_API . '/charge';
        try {
            $response = $this->client->post($uri, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'body' => json_encode($charge)
            ]);
        } catch (ClientException $exception) {
            // TODO: decide how to differentiate any type of error
            throw new ChargeAlreadyCreatedException(
                json_encode(['error' => 'Charge "correlationId" already been used.']),
                422
            );
        }

        return $this->success($response->getBody());
    }
}
