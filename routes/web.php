<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'index')->name('admin');
    });
});

//Category CRUD
Route::controller(CategoryController::class)->group(function () {
    Route::prefix('admin/categories')->group(function () {
        Route::get('/', 'index')->name('list-categories');
        Route::get('/create', 'create')->name('create-categories');
        Route::post('/create', 'store')->name('post-categories');
        Route::get('/edit/{id}', 'edit')->name('edit-categories');
        Route::post('/update/{id}', 'update')->name('update-categories');
        Route::post('/delete/{id}', 'delete')->name('delete-categories');
    });
});


require __DIR__.'/auth.php';
