<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

//Setting CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SettingController::class)->group(function () {
        Route::prefix('admin/settings')->group(function () {
            Route::get('/', 'index')->name('list-settings');
            Route::get('/create', 'create')->name('create-settings');
            Route::post('/create', 'store')->name('post-settings');
            Route::get('/edit/{id}', 'edit')->name('edit-settings');
            Route::post('/update/{id}', 'update')->name('update-settings');
            Route::get('/delete/{id}', 'delete')->name('delete-settings');
        });
    });
});
