<?php

namespace DanielHe4rt\Larapix\Payments\Contracts;

use DanielHe4rt\Larapix\Payments\Pix;
use DanielHe4rt\Larapix\Payments\QrCode;

interface PaymentsContract
{
    public function initPixPayment(Pix $pix): array;

    public function initQrCodePayment(QrCode $qrCode): array;

    public function confirmPayment(string $paymentCorrelationId): array;
}
