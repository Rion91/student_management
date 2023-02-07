<?php

// Prefix: /api/students
use App\Services\Students\Http\Controllers\StudentController;

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->middleware('paginator')->middleware('permission:index-student');
    Route::get('/{studentId}', [StudentController::class, 'show'])->middleware('permission:detail-student');

    //No authentication is required to register students.
    Route::post('/store', [StudentController::class, 'store']);
});
