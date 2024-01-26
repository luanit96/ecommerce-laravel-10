<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

//Tag CRUD
Route::controller(TagController::class)->group(function () {
    Route::prefix('admin/tags')->group(function () {
        Route::get('/', 'index')->name('list-tags');
        Route::get('/create', 'create')->name('create-tags');
        Route::post('/create', 'store')->name('post-tags');
        Route::get('/edit/{id}', 'edit')->name('edit-tags');
        Route::post('/update/{id}', 'update')->name('update-tags');
        Route::get('/delete/{id}', 'delete')->name('delete-tags');
    });
});