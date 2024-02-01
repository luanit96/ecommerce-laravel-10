<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', 'index')->middleware('can:dashboard')->name('dashboard');
        });
    });
});