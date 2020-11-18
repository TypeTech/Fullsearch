<?php

return [
    'connection' => env('DB_CONNECTION', 'pgsql'),
    'maintain_index' => true,
    'config' => 'english',
    'search_using' => 'tsquery',
    'driver' => env('SCOUT_DRIVER', 'pgsql'),
    'prefix' => env('SCOUT_PREFIX', ''),
    'queue' => false,
    'pgsql' => [
        'connection' => 'pgsql',
        'maintain_index' => true,
        'config' => 'english',
    ],
];
