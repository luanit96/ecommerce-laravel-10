<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

//Sample CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SampleController::class)->group(function () {
        Route::prefix('admin/samples')->group(function () {
            Route::get('/', 'index')->name('list-samples')->middleware('can:list-sample');
            Route::get('/create', 'create')->name('create-samples')->middleware('can:add-sample');
            Route::post('/create', 'store')->name('post-samples');
            Route::get('/edit/{id}', 'edit')->name('edit-samples')->middleware('can:edit-sample');
            Route::post('/update/{id}', 'update')->name('update-samples');
            Route::get('/delete/{id}', 'delete')->name('delete-samples')->middleware('can:delete-sample');
        });
    });
});