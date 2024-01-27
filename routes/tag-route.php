<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

//Tag CRUD
Route::controller(TagController::class)->group(function () {
    Route::prefix('admin/tags')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-tags');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-tags');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-tags');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-tags');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-tags');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-tags');
    });
});