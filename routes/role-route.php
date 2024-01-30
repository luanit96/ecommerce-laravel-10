<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

//Role CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::prefix('admin/roles')->group(function () {
            Route::get('/', 'index')->name('list-roles');
            Route::get('/create', 'create')->name('create-roles');
            Route::post('/create', 'store')->name('post-roles');
            Route::get('/edit/{id}', 'edit')->name('edit-roles');
            Route::post('/update/{id}', 'update')->name('update-roles');
            Route::get('/delete/{id}', 'delete')->name('delete-roles');
        });
    });
});
