<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppearanceController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/usercv', [HomeController::class, 'usercv'])->name('usercv');

Route::get('/usercv/{user:username?}', [HomeController::class, 'landingcv'])->name('landingcv');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/appearance/{user:username}', [AppearanceController::class, 'edit'])->name('appearance.edit')->middleware('verified');

        Route::put('/appearance/{user:username?}', [AppearanceController::class, 'update'])->name('appearance.update')->middleware('verified');

        Route::get('/exports/pdf/{user:username}', [ExportController::class, 'exportPdf'])->name('exports.pdf')->middleware(['verified', 'throttle:6,1']);
    });
});


require __DIR__.'/auth.php';
