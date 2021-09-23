<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LOGIN
Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest');
Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
    Route::post('/', [AuthenticatedSessionController::class, 'store'])->name('login');
});

// LOGOUT
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// FORGOT PASSWORD
Route::group(['prefix' => 'forgot-password', 'middleware' => 'guest'], function () {
    Route::get('/', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

// RESET PASSWORD
Route::group(['prefix' => 'reset-password', 'middleware' => 'guest'], function () {
    Route::get('/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [PointController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user', 'middleware' => ['role:administrator']], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::delete('/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('user.delete');
        Route::post('/{id}', [UserController::class, 'restore'])->where('id', '[0-9]+')->name('user.restore');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->where('id', '[0-9]+')->name('user.edit');
        Route::get('/show/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('user.show');
        Route::put('/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('user.update');
    });

    Route::group(['prefix' => 'point'], function () {
        Route::post('/', [PointController::class, 'store'])->name('point.store');
    });
});
