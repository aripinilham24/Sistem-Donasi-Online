<?php

namespace App\Libraries;

use Midtrans\Config;

class MidtransSnap
{
    public function __construct()
    {
        Config::$serverKey = 'ISI_DENGAN_SERVER_KEY_ANDA';
        Config::$isProduction = false; // Sandbox mode
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
