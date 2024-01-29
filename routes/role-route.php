<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

//Role CRUD
Route::controller(RoleController::class)->group(function () {
    Route::prefix('admin/roles')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-roles');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-roles');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-roles');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-roles');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-roles');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-roles');
    });
});