<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

//Slider CRUD
Route::controller(SliderController::class)->group(function () {
    Route::prefix('admin/sliders')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-sliders');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-sliders');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-sliders');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-sliders');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-sliders');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-sliders');
    });
});