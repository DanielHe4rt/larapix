<?php

namespace DanielHe4rt\Larapix\Core;

use DanielHe4rt\Larapix\Charges\Contracts\ChargeContract;
use DanielHe4rt\Larapix\Payments\Contracts\PaymentsContract;
use DanielHe4rt\Larapix\Refunds\Contracts\RefundsContract;

interface LarapixContract
{
    public function charges(): ChargeContract;

    public function refunds(): RefundsContract;

    public function payments(): PaymentsContract;
}
