<?php

return [
    'csrf' => [
        'same_site' => 'lax',
        'secure' => env('APP_ENV') === 'production',
        'http_only' => true,
    ],
    
    'headers' => [
        'x-frame-options' => 'DENY',
        'x-content-type-options' => 'nosniff',
        'x-xss-protection' => '1; mode=block',
        'strict-transport-security' => 'max-age=31536000; includeSubDomains',
    ],
    
    'rate_limiting' => [
        'api' => '60,1',
        'web' => '1000,1',
        'login' => '5,1',
    ],
];