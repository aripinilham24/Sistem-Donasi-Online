<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use League\OAuth2\Client\Provider\Google;

class OAuth extends BaseConfig
{
    public static function google()
    {
        return new Google([
            'clentId'=>'your-google-cliet-id',
            'clientSecret'=>'your-google-secret',
            'redirectUri'=>base_url('auth/callback/google')
        ]);
    }
}
