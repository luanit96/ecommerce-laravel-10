<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionRoleController;

//Role CRUD
Route::controller(PermissionRoleController::class)->group(function () {
    Route::prefix('admin/permission-role')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-permission-role');
    });
});