<?php

// Prefix: /api/students
use App\Services\Students\Http\Controllers\StudentController;

Route::group(['prefix' => 'students'], function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('/', [StudentController::class, 'index']);
        Route::post('/store', [StudentController::class, 'store']);
    });
});
