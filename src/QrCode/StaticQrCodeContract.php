<?php

namespace DanielHe4rt\Larapix\QrCode;

interface StaticQrCodeContract
{
    public function generate(StaticQrCode $qrCode): array;
}