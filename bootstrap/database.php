<?php

use Core\Database\Connection;

// Example PDO connection bootstrap
Connection::set([
    'driver' => env('DB_DRIVER', 'mysql'),
    'host'   => env('DB_HOST', '127.0.0.1'),
    'db'     => env('DB_NAME', 'app'),
    'user'   => env('DB_USER', 'root'),
    'pass'   => env('DB_PASS', ''),
]);