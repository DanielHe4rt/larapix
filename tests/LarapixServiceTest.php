<?php

namespace DanielHe4rt\Larapix\Tests;

use GuzzleHttp\Client;
use DanielHe4rt\Larapix\Charges\Contracts\ChargeContract;
use DanielHe4rt\Larapix\Core\LarapixContract;
use DanielHe4rt\Larapix\Core\LarapixService;
use DanielHe4rt\Larapix\Customers\Contracts\CustomerContract;
use DanielHe4rt\Larapix\Payments\Contracts\PaymentsContract;
use DanielHe4rt\Larapix\Refunds\Contracts\RefundsContract;
use DanielHe4rt\Larapix\Transactions\Contracts\TransactionContract;
use DanielHe4rt\Larapix\Webhooks\Contracts\WebhooksContract;
use PHPUnit\Framework\TestCase;

class LarapixServiceTest extends TestCase
{
    private $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new LarapixService(new Client());
    }

    public function test_larapix_contract()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
    }

    public function test_larapix_charge_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(ChargeContract::class, $this->service->charges());
    }

    public function test_larapix_refund_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(RefundsContract::class, $this->service->refunds());
    }

    public function test_larapix_payments_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(PaymentsContract::class, $this->service->payments());
    }

    public function test_larapix_transactions_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(TransactionContract::class, $this->service->transactions());
    }

    public function test_larapix_webhooks_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(WebhooksContract::class, $this->service->webhooks());
    }

    public function test_larapix_customers_function()
    {
        $this->assertInstanceOf(LarapixContract::class, $this->service);
        $this->assertInstanceOf(CustomerContract::class, $this->service->customers());
    }
}
