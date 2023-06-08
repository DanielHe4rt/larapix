<?php

namespace DanielHe4rt\Larapix\Webhooks\Contracts;

use DanielHe4rt\Larapix\Webhooks\Webhook;

interface WebhooksContract
{
    public function create(Webhook $webhook): array;

    public function findAll(array $parameters = []): array;

    public function delete(string $webhookId): array;
}
