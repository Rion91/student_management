<?php

use App\Services\Users\Http\Controllers\UserController;

Route::apiResource('/users', UserController::class)
    ->middleware(['role:super-admin']);
