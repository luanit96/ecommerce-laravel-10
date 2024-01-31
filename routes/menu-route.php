<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

//Menu CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(MenuController::class)->group(function () {
        Route::prefix('admin/menus')->group(function () {
            Route::get('/', 'index')->name('list-menus')->middleware('can:list-menu');
            Route::get('/create', 'create')->name('create-menus')->middleware('can:add-menu');
            Route::post('/create', 'store')->name('post-menus');
            Route::get('/edit/{id}', 'edit')->name('edit-menus')->middleware('can:edit-menu');
            Route::post('/update/{id}', 'update')->name('update-menus');
            Route::get('/delete/{id}', 'delete')->name('delete-menus')->middleware('can:delete-menu');
        });
    });
});
