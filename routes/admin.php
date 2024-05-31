<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes **/
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('profile');
        Route::put('/', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
        Route::put('password', [AdminProfileController::class, 'updatePassword'])->name('profile.password.update');
    });

    /** Slider Routes **/
    Route::resource('slider', SliderController::class);
});

