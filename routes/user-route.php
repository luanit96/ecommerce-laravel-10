<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Slider CRUD
Route::controller(UserController::class)->group(function () {
    Route::prefix('admin/users')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-users');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-users');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-users');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-users');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-users');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-users');
    });
});