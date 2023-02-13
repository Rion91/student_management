<?php

use App\Enums\PermissionEnum;
use App\Services\Students\Http\Controllers\StudentController;

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->permission(PermissionEnum::INDEX_STUDENT->value)->middleware('paginator');
    Route::get('/{student}', [StudentController::class, 'show'])->permission(PermissionEnum::SHOW_STUDENT->value);
    Route::delete('/{student}', [StudentController::class, 'destroy'])->permission(PermissionEnum::DELETE_STUDENT->value);
    Route::put('/{student}', [StudentController::class, 'update'])->permission(PermissionEnum::UPDATE_STUDENT->value);
    //No authentication is required for register students.
    Route::post('/', [StudentController::class, 'store']);
});
