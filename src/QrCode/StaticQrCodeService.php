<?php

namespace DanielHe4rt\Larapix\QrCode;

use DanielHe4rt\Larapix\Core\Services\BaseService;
use GuzzleHttp\Client;

class StaticQrCodeService extends BaseService implements StaticQrCodeContract
{
    const BASE_API = 'https://api.openpix.com.br/api/v1/qrcode-static';

    public function __construct(private readonly Client $client)
    {
    }
    public function generate(StaticQrCode $qrCode): array
    {
        $uri = self::BASE_API;
        $response = $this->client->post($uri, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($qrCode)
        ]);

        return $this->success($response->getBody());
    }
}