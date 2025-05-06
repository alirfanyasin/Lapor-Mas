<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\NotificationController;

Route::prefix('app')->middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/reports', [AdminReportController::class, 'index'])->name('report.index');
    Route::get('/reports/{id}/show', [AdminReportController::class, 'show'])->name('report.show');
    Route::patch('/reports/{id}/status', [AdminReportController::class, 'updateStatus'])->name('laporan.updateStatus');

    Route::get('/report/notifications', [NotificationController::class, 'notifications'])->name('report.notifications');
    Route::get('/report/notifications/{id}/show', [NotificationController::class, 'showNotification'])->name('report.show.notification');

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
