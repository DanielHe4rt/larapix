<?php

namespace DanielHe4rt\Larapix\Core;

use DanielHe4rt\Larapix\QrCode\StaticQrCodeContract;
use DanielHe4rt\Larapix\QrCode\StaticQrCodeService;
use GuzzleHttp\Client;
use DanielHe4rt\Larapix\Charges\Contracts\ChargeContract;
use DanielHe4rt\Larapix\Charges\Services\ChargeService;
use DanielHe4rt\Larapix\Customers\Contracts\CustomerContract;
use DanielHe4rt\Larapix\Customers\Services\CustomerService;
use DanielHe4rt\Larapix\Payments\Contracts\PaymentsContract;
use DanielHe4rt\Larapix\Payments\Services\PaymentsService;
use DanielHe4rt\Larapix\Refunds\Contracts\RefundsContract;
use DanielHe4rt\Larapix\Refunds\Services\RefundsService;
use DanielHe4rt\Larapix\Transactions\Contracts\TransactionContract;
use DanielHe4rt\Larapix\Transactions\Services\TransactionsService;
use DanielHe4rt\Larapix\Webhooks\Contracts\WebhooksContract;
use DanielHe4rt\Larapix\Webhooks\Services\WebhooksService;

class LarapixService implements LarapixContract
{

    public function __construct(private readonly Client $client)
    {
    }

    public function charges(): ChargeContract
    {
        return new ChargeService($this->client);
    }

    public function refunds(): RefundsContract
    {
        return new RefundsService($this->client);
    }

    public function payments(): PaymentsContract
    {
        return new PaymentsService($this->client);
    }

    public function transactions(): TransactionContract
    {
        return new TransactionsService($this->client);
    }

    public function webhooks(): WebhooksContract
    {
        return new WebhooksService($this->client);
    }

    public function customers(): CustomerContract
    {
        return new CustomerService($this->client);
    }

    public function qrCode(): StaticQrCodeContract
    {
        return new StaticQrCodeService($this->client);
    }
}
