<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;

//Size CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SizeController::class)->group(function () {
        Route::prefix('admin/sizes')->group(function () {
            Route::get('/', 'index')->name('list-sizes')->middleware('can:list-size');
            Route::get('/create', 'create')->name('create-sizes')->middleware('can:add-size');
            Route::post('/create', 'store')->name('post-sizes');
            Route::get('/edit/{id}', 'edit')->name('edit-sizes')->middleware('can:edit-size');
            Route::post('/update/{id}', 'update')->name('update-sizes');
            Route::get('/delete/{id}', 'delete')->name('delete-sizes')->middleware('can:delete-size');
        });
    });
});