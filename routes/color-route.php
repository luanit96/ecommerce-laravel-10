<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;

//Color CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(ColorController::class)->group(function () {
        Route::prefix('admin/colors')->group(function () {
            Route::get('/', 'index')->name('list-colors');
            Route::get('/create', 'create')->name('create-colors');
            Route::post('/create', 'store')->name('post-colors');
            Route::get('/edit/{id}', 'edit')->name('edit-colors');
            Route::post('/update/{id}', 'update')->name('update-colors');
            Route::get('/delete/{id}', 'delete')->name('delete-colors');
        });
    });
});