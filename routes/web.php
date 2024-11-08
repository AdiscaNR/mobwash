<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Transaction\TransactionController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login-process', [AuthController::class, 'login_action'])->name('login.action');
Route::get('order/{id}', [TransactionController::class, 'order'])->name('order');
Route::post('order', [TransactionController::class, 'oderStore'])->name('order.store');

Route::middleware(['auth', 'auth.session'])->group(function () {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/recap', [DashboardController::class, 'recap'])->name('dashboard.recap');

  Route::prefix('trx')->group(function () {
    Route::get('create', [TransactionController::class, 'create'])->name('trx.create');
    Route::post('store', [TransactionController::class, 'store'])->name('trx.store');
    Route::get('{id}', [TransactionController::class, 'view'])->name('trx.view');
  });
});