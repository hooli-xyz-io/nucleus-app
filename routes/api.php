<?php

use Core\Http\ApiResponse;
use Core\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| All routes here are prefixed with /api by convention.
| Open routes are accessible without authentication.
| Protected routes require a valid Bearer token.
|
*/

Route::get('/', function () {
    return ApiResponse::success([
        'message' => 'Welcome to Nucleus Framework',
    ]);
});

