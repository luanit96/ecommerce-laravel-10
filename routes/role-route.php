<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

//Role CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::prefix('admin/roles')->group(function () {
            Route::get('/', 'index')->name('list-roles')->middleware('can:list-role');
            Route::get('/create', 'create')->name('create-roles')->middleware('can:add-role');
            Route::post('/create', 'store')->name('post-roles');
            Route::get('/edit/{id}', 'edit')->name('edit-roles')->middleware('can:edit-role');
            Route::post('/update/{id}', 'update')->name('update-roles');
            Route::get('/delete/{id}', 'delete')->name('delete-roles')->middleware('can:delete-role');
        });
    });
});
