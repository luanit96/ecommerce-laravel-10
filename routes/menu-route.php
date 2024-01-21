<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

//Menu CRUD
Route::controller(MenuController::class)->group(function () {
    Route::prefix('admin/menus')->group(function () {
        Route::get('/', 'index')->name('list-menus');
        Route::get('/create', 'create')->name('create-menus');
        Route::post('/create', 'store')->name('post-menus');
        Route::get('/edit/{id}', 'edit')->name('edit-menus');
        Route::post('/update/{id}', 'update')->name('update-menus');
        Route::post('/delete/{id}', 'delete')->name('delete-menus');
    });
});