<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

//Role CRUD
Route::controller(UserRoleController::class)->group(function () {
    Route::prefix('admin/user-role')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-user-role');
    });
});