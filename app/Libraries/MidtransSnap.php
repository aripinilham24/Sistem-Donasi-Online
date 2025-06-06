<?php

namespace App\Libraries;

use Midtrans\Config;

class MidtransSnap
{
    public function __construct()
    {
       Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Sandbox mode
        Config::$isSanitized = true;
        Config::$is3ds = true;
        

    }
}
