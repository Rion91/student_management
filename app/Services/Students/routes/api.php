<?php

// Prefix: /api/students
use App\Services\Students\Http\Controllers\StudentController;

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->middleware('permission:index-student')->middleware('paginator');
    Route::get('/{studentId}', [StudentController::class, 'show'])->middleware('permission:detail-student');
    Route::delete('/{studentId}', [StudentController::class, 'destroy'])->middleware('permission:delete-student');
    Route::put('/{studentId}', [StudentController::class, 'update'])->middleware('permission:update-student');
    //No authentication is required to register students.
    Route::post('/store', [StudentController::class, 'store']);
});
