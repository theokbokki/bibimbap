<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RootController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/', [RootController::class, 'index']);

    Route::delete('/auth/login', [LoginController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
    Route::post('/auth/login', [LoginController::class, 'store']);

    Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/auth/register', [RegisterController::class, 'store'])->name('register');

    Route::get('/redirect', [RedirectController::class, 'index']);
    Route::post('/redirect', [RedirectController::class, 'appRedirect']);
});
