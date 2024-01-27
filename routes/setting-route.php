<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

//Tag CRUD
Route::controller(SettingController::class)->group(function () {
    Route::prefix('admin/settings')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-settings');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-settings');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-settings');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-settings');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-settings');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-settings');
    });
});