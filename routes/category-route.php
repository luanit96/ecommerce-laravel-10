<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

//Category CRUD
Route::controller(CategoryController::class)->group(function () {
    Route::prefix('admin/categories')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-categories');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-categories');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-categories');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-categories');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-categories');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-categories');
    });
});