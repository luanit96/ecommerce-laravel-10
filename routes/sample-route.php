<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

//Sample CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SampleController::class)->group(function () {
        Route::prefix('admin/samples')->group(function () {
            Route::get('/', 'index')->name('list-samples');
            Route::get('/create', 'create')->name('create-samples');
            Route::post('/create', 'store')->name('post-samples');
            Route::get('/edit/{id}', 'edit')->name('edit-samples');
            Route::post('/update/{id}', 'update')->name('update-samples');
            Route::get('/delete/{id}', 'delete')->name('delete-samples');
        });
    });
});