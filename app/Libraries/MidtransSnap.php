<?php

namespace App\Libraries;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransSnap
{
    public function __construct()
    {
        // Ambil dari .env
        Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // true = live
        Config::$isSanitized = true;
        Config::$is3ds = true;
        
    }

    public function createSnapToken($params)
    {
        return Snap::getSnapToken($params);
    }
}
