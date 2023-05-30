<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/table', [DashboardController::class, 'table'])->name('tabledashboard');
    Route::get('/utilities-color', [DashboardController::class, 'utilities_color']);
    Route::get('/utilities-border', [DashboardController::class, 'utilities_border']);
    Route::get('/utilities-animation', [DashboardController::class, 'utilities_animation']);
    Route::get('/utilities-other', [DashboardController::class, 'utilities_other']);
    Route::get('/buttons', [DashboardController::class, 'buttons']);
    Route::get('/cards', [DashboardController::class, 'cards']);
    Route::get('/charts', [DashboardController::class, 'charts']);
    Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');
    Route::get('/404', [DashboardController::class, 'error_404'])->name('404');
    Route::get('/register', [DashboardController::class, 'register'])->name('dashboardregister');
    Route::get('/forgot-password', [DashboardController::class, 'forgot_password'])->name('dashboardforgorpassword');

    // Route::get('partner', function () {
    //     return view('dashboard.partner.index');
    // })->name('partner.index');

    Route::view('/partner', 'dashboard.partner.index')->name('dashboard.partner.index');
    Route::view('/partner/detail', 'dashboard.partner.detail')->name('dashboard.partner.detail');
    Route::view('/transaction', 'dashboard.transaction.index')->name('dashboard.transaction.index');
    Route::view('/review', 'dashboard.review.index')->name('dashboard.review.index');
    Route::view('/banner', 'dashboard.banner.index')->name('dashboard.banner.index');
    Route::view('/squarefeed', 'dashboard.squarefeed.index')->name('dashboard.squarefeed.index');
    Route::view('/customer', 'dashboard.customer.index')->name('dashboard.customer.index');
});

Route::get('/login', [DashboardController::class, 'login'])->name('login');
