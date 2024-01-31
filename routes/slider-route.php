<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

//Slider CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SliderController::class)->group(function () {
        Route::prefix('admin/sliders')->group(function () {
            Route::get('/', 'index')->name('list-sliders')->middleware('can:list-slider');
            Route::get('/create', 'create')->name('create-sliders')->middleware('can:add-slider');
            Route::post('/create', 'store')->name('post-sliders');
            Route::get('/edit/{id}', 'edit')->name('edit-sliders')->middleware('can:edit-slider');
            Route::post('/update/{id}', 'update')->name('update-sliders');
            Route::get('/delete/{id}', 'delete')->name('delete-sliders')->middleware('can:delete-slider');
        });
    });
});
