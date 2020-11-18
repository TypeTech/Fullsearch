<?php

return [
    'driver' => env('SCOUT_DRIVER', 'pgsql'),
    'prefix' => env('SCOUT_PREFIX', ''),
    'queue' => false,
    'pgsql' => [
        'connection' => 'pgsql',
        'maintain_index' => true,
        'config' => 'english',
    ],
];
