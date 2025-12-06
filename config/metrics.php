<?php

return [
    'enabled' => env('METRICS_ENABLED', true),

    'cache_ttl' => env('METRICS_CACHE_TTL', 5), // seconds

    'collection' => [
        'enabled' => env('METRICS_COLLECTION_ENABLED', true),
        'interval' => env('METRICS_COLLECTION_INTERVAL', 300), // 5 minutes
        'retention_days' => env('METRICS_RETENTION_DAYS', 30),
    ],

    'realtime' => [
        'enabled' => env('METRICS_REALTIME_ENABLED', true),
        'max_connections' => env('METRICS_MAX_SSE_CONNECTIONS', 3),
        'timeout' => env('METRICS_SSE_TIMEOUT', 300), // 5 minutes
    ],

    'allowed_ips' => env('METRICS_ALLOWED_IPS', null), // Comma-separated
];
