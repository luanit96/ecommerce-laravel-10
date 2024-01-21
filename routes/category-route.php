<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

//Category CRUD
Route::controller(CategoryController::class)->group(function () {
    Route::prefix('admin/categories')->group(function () {
        Route::get('/', 'index')->name('list-categories');
        Route::get('/create', 'create')->name('create-categories');
        Route::post('/create', 'store')->name('post-categories');
        Route::get('/edit/{id}', 'edit')->name('edit-categories');
        Route::post('/update/{id}', 'update')->name('update-categories');
        Route::post('/delete/{id}', 'delete')->name('delete-categories');
    });
});