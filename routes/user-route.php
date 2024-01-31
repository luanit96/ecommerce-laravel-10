<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//User CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::prefix('admin/users')->group(function () {
            Route::get('/', 'index')->name('list-users')->middleware('can:list-user');
            Route::get('/create', 'create')->name('create-users')->middleware('can:add-user');
            Route::post('/create', 'store')->name('post-users');
            Route::get('/edit/{id}', 'edit')->name('edit-users')->middleware('can:edit-user');
            Route::post('/update/{id}', 'update')->name('update-users');
            Route::get('/delete/{id}', 'delete')->name('delete-users')->middleware('can:delete-user');
        });
    });
});
