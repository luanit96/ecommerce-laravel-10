<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

//Slider CRUD
Route::controller(SliderController::class)->group(function () {
    Route::prefix('admin/sliders')->group(function () {
        Route::get('/', 'index')->name('list-sliders');
        Route::get('/create', 'create')->name('create-sliders');
        Route::post('/create', 'store')->name('post-sliders');
        Route::get('/edit/{id}', 'edit')->name('edit-sliders');
        Route::post('/update/{id}', 'update')->name('update-sliders');
        Route::get('/delete/{id}', 'delete')->name('delete-sliders');
    });
});