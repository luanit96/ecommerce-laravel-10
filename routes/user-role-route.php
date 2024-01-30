<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

//Role CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(UserRoleController::class)->group(function () {
        Route::prefix('admin/user-role')->group(function () {
            Route::get('/', 'index')->name('list-user-role');
        });
    });
});
