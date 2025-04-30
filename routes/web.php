<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
