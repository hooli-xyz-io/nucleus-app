<?php

require_once __DIR__ . '/../bootstrap/app.php';

use Core\Routing\Route;
use Core\Routing\Router;

require_once __DIR__ . '/../routes/web.php';

Route::group(['prefix' => 'api'], function () {
    require_once __DIR__ . '/../routes/api.php';
});

Router::dispatch();
