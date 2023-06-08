<?php

namespace DanielHe4rt\Larapix\QrCode;

use JsonSerializable;

class StaticQrCode implements JsonSerializable
{
    public function __construct(
        private readonly string $correlationId,
        private readonly string $identifier,
        private readonly string $name,
        private readonly int    $value
    )
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'correlationID' => $this->correlationId,
            'name' => $this->name,
            'identifier' => $this->identifier,
            'value' => $this->value
        ];
    }
}