<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

//Tag CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(TagController::class)->group(function () {
        Route::prefix('admin/tags')->group(function () {
            Route::get('/', 'index')->name('list-tags')->middleware('can:list-tag');
            Route::get('/create', 'create')->name('create-tags')->middleware('can:add-tag');
            Route::post('/create', 'store')->name('post-tags');
            Route::get('/edit/{id}', 'edit')->name('edit-tags')->middleware('can:edit-tag');
            Route::post('/update/{id}', 'update')->name('update-tags');
            Route::get('/delete/{id}', 'delete')->name('delete-tags')->middleware('can:delete-tag');
        });
    });
});
