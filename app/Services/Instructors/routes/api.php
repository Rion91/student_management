<?php

use App\Enums\PermissionEnum;
use App\Services\Instructors\Http\Controllers\InstructorController;

Route::group(['prefix' => 'instructors'], function () {
    Route::get('/', [InstructorController::class, 'index'])->permission(PermissionEnum::INDEX_INSTRUCTOR->value)->middleware('paginator');
    Route::get('/{instructor}', [InstructorController::class, 'show'])->permission(PermissionEnum::SHOW_INSTRUCTOR->value);
    Route::post('/', [InstructorController::class, 'store'])->permission(PermissionEnum::CREATE_INSTRUCTOR->value);
    Route::put('/{instructor}', [InstructorController::class, 'update'])->permission(PermissionEnum::UPDATE_INSTRUCTOR->value);
    Route::delete('/{instructor}', [InstructorController::class, 'destroy'])->permission(PermissionEnum::DELETE_INSTRUCTOR->value);
});
