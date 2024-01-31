<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionRoleController;

//Permission Role List
Route::middleware(['auth', 'can:list-permission-role'])->group(function () {
    Route::controller(PermissionRoleController::class)->group(function () {
        Route::prefix('admin/permission-role')->group(function () {
            Route::get('/', 'index')->name('list-permission-role');
        });
    });
});
