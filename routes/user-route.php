<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Slider CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::prefix('admin/users')->group(function () {
            Route::get('/', 'index')->name('list-users');
            Route::get('/create', 'create')->name('create-users');
            Route::post('/create', 'store')->name('post-users');
            Route::get('/edit/{id}', 'edit')->name('edit-users');
            Route::post('/update/{id}', 'update')->name('update-users');
            Route::get('/delete/{id}', 'delete')->name('delete-users');
        });
    });
});
