<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

//Category CRUD

Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::prefix('admin/categories')->group(function () {
            Route::get('/', 'index')->name('list-categories')
                ->middleware('can:list-category');
            Route::get('/create', 'create')->name('create-categories')
                ->middleware('can:add-category');
            Route::post('/create', 'store')->name('post-categories');
            Route::get('/edit/{id}', 'edit')->name('edit-categories')
                ->middleware('can:edit-category');
            Route::post('/update/{id}', 'update')->name('update-categories');
            Route::get('/delete/{id}', 'delete')->name('delete-categories')
                ->middleware('can:delete-category');
        });
    });
});