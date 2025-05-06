<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminReportController;




Route::prefix('app')->middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminReportController::class, 'index'])->name('dashboard');
    Route::patch('/laporan/{id}/status', [AdminReportController::class, 'updateStatus'])->name('laporan.updateStatus');
    // Logout admin
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});


Route::prefix('admin')->middleware('guest')->group(function () {
    // Auth admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

Route::get('/', [ReportController::class, 'index'])->name('home');
Route::post('/', [ReportController::class, 'store'])->name('store.report');
