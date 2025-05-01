<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LaporanController;

Route::get('/', [ReportController::class, 'index'])->name('home');
Route::post('/', [ReportController::class, 'store'])->name('store.report');


Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
    ];
    return view('pages.index', $data);
})->name('dashboard');

Route::prefix('app')->group(function () {
    Route::get('/calendar', function () {
        $data = [
            'title' => 'Calendar',
        ];
        return view('pages.app-calendar', $data);
    })->name('app-calendar');

    Route::get('/gallery', function () {
        $data = [
            'title' => 'Gallery',
        ];
        return view('pages.app-gallery', $data);
    })->name('app-gallery');

    Route::get('/plans', function () {
        $data = [
            'title' => 'Pricing Plans',
        ];
        return view('pages.app-plans', $data);
    })->name('app-plans');

    Route::get('/contacts', function () {
        $data = [
            'title' => 'Contacts',
        ];
        return view('pages.app-contacts', $data);
    })->name('app-contact');
});


Route::get('/starter-page', function () {
    return view('pages.starter-page');
})->name('starter-page');

// Tampilkan form login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
// Proses login
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
// Logout admin
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/dashboard', [LaporanController::class, 'index'])->name('dashboard');
Route::patch('/laporan/{id}/status', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');

