<?php

// Prefix: /api/students
use App\Services\Students\Http\Controllers\StudentController;

Route::group(['prefix' => 'students'], function () {
    Route::middleware(['auth:api', 'paginator'])->group(function () {
        Route::get('/', [StudentController::class, 'index']);
    });

    //No authentication is required to register students.
    Route::post('/store', [StudentController::class, 'store']);
});
