<?php

$connection = [
    'driver' => env('DB_CONNECTION') ?? 'mysql',
    'host' => env('DB_HOST') ?? '127.0.0.1',
    'port' => env('DB_PORT') ?? '3306',
    'name' => env('DB_NAME') ?? 'involve_asia_book_test',
    'username' => env('DB_USERNAME') ?? 'root',
    'password' => env('DB_PASSWORD') ?? '',
];
