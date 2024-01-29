<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

//Permission CRUD
Route::controller(PermissionController::class)->group(function () {
    Route::prefix('admin/permissions')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-permissions');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-permissions');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-permissions');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-permissions');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-permissions');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-permissions');
    });
});