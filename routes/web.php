<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;

Route::get('/', function () {
    return redirect('/dashboard');
})->name('slash.home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth.jwt');
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
    Route::get('/forgot-password', [DashboardController::class, 'forgot_password'])->name('dashboardforgorpassword');


    // Route::view('/partner/detail', 'dashboard.partner.detail')->name('dashboard.partner.detail');
    // Route::view('/transaction', 'dashboard.transaction.index')->name('dashboard.transaction.index');
    Route::view('/review', 'dashboard.review.index')->name('dashboard.review.index');
    Route::view('/banner', 'dashboard.banner.index')->name('dashboard.banner.index');
    Route::view('/squarefeed', 'dashboard.squarefeed.index')->name('dashboard.squarefeed.index');


    // partner 
    Route::get('/partner', [PartnerController::class, 'index'])->name('dashboard.partner.index');
    Route::get('/partner/{id}', [PartnerController::class, 'show'])->name('dashboard.partner.show');
    Route::post('/partner/{id}', [PartnerController::class, 'update'])->name('dashboard.partner.update');
    Route::get('/partner/{id}/confirmation/{account_status}', [PartnerController::class, 'confirmation'])->name('dashboard.partner.confirmation');
    Route::post('/partner', [PartnerController::class, 'destroy'])->name('dashboard.partner.destroy');

    // transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('dashboard.transaction.index');
    Route::get('/transaction/{id}/confirmation/{status}', [TransactionController::class, 'confirmation'])->name('dashboard.partner.confirmation');
    // Route::get('/partner/{id}', [PartnerController::class, 'show'])->name('transaction.partner.show');
    // Route::post('/partner/{id}', [PartnerController::class, 'update'])->name('transaction.partner.update');
    // Route::post('/partner', [PartnerController::class, 'destroy'])->name('transaction.partner.destroy');


    Route::get('/customer', [UserController::class, 'index'])->name('dashboard.customer.index');
    Route::get('/customer/delete/{id}', [UserController::class, 'destroy']);
    Route::post('/customer/{id}', [UserController::class, 'update'])->name('dashboard.customer.update');
});

Route::get('/login', [DashboardController::class, 'login'])->name('dashboardlogin');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [DashboardController::class, 'register'])->name('dashboardregister');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
