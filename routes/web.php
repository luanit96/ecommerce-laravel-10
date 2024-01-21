<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::controller(AdminController::class)->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
