<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

//Setting CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(SettingController::class)->group(function () {
        Route::prefix('admin/settings')->group(function () {
            Route::get('/', 'index')->name('list-settings')->middleware('can:list-setting');
            Route::get('/create', 'create')->name('create-settings')->middleware('can:add-setting');
            Route::post('/create', 'store')->name('post-settings');
            Route::get('/edit/{id}', 'edit')->name('edit-settings')->middleware('can:edit-setting');
            Route::post('/update/{id}', 'update')->name('update-settings');
            Route::get('/delete/{id}', 'delete')->name('delete-settings')->middleware('can:delete-setting');
        });
    });
});
