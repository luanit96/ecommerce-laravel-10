<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

//Menu CRUD
Route::controller(MenuController::class)->group(function () {
    Route::prefix('admin/menus')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-menus');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-menus');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-menus');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-menus');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-menus');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-menus');
    });
});