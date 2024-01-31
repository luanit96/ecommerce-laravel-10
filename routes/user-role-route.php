<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

//User Role List
Route::middleware(['auth', 'can:list-user-role'])->group(function () {
    Route::controller(UserRoleController::class)->group(function () {
        Route::prefix('admin/user-role')->group(function () {
            Route::get('/', 'index')->name('list-user-role');
        });
    });
});
