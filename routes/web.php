<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SavingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function(){
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function(){
    Route::get('/', [Controller::class, 'index'])->name('dashboard.index');

    Route::resource('bills', BillController::class);
    Route::patch('/bills/{bill}/pay', [BillController::class, 'markAsPaid'])->name('bills.pay');

    Route::resource('savings', SavingController::class);
    Route::patch('/savings/{saving}/add-funds', [SavingController::class, 'addFunds'])->name('savings.addFunds');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
