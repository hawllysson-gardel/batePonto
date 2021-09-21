<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user-type'], function () {
    Route::get('/{id}', [UserTypeController::class, 'get'])->where('id', '[0-9]+')->name('user-type');
    Route::get('/', [UserTypeController::class, 'search'])->name('search-user-types');
    Route::post('/', [UserTypeController::class, 'store'])->name('store-user-type');
    Route::put('/{id}', [UserTypeController::class, 'update'])->where('id', '[0-9]+')->name('update-user-type');
    Route::delete('/{id}', [UserTypeController::class, 'destroy'])->where('id', '[0-9]+')->name('delete-user-type');
    Route::delete('/force/{id}', [UserTypeController::class, 'forceDestroy'])->where('id', '[0-9]+')->name('force-delete-user-type');
    Route::post('/{id}', [UserTypeController::class, 'restore'])->name('restore-user-type');
});