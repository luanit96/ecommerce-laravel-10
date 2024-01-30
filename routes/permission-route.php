<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

//Permission CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(PermissionController::class)->group(function () {
        Route::prefix('admin/permissions')->group(function () {
            Route::get('/', 'index')->name('list-permissions');
            Route::get('/create', 'create')->name('create-permissions');
            Route::post('/create', 'store')->name('post-permissions');
            Route::get('/edit/{id}', 'edit')->name('edit-permissions');
            Route::post('/update/{id}', 'update')->name('update-permissions');
            Route::get('/delete/{id}', 'delete')->name('delete-permissions');
        });
    });
});
