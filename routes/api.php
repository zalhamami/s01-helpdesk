<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'ticket'], function () {
    Route::get('/{ticket}', [TicketController::class, 'get'])->name('ticket.get');
});

Route::group(['prefix' => 'location'], function () {
    Route::get('/{location}', [LocationController::class, 'get'])->name('location.get');
});

Route::group(['prefix' => 'user-setting'], function () {
    Route::get('/{userSetting}', [UserSettingController::class, 'get'])->name('userSetting.get');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/{user}', [UserController::class, 'get'])->name('userSetting.get');
});
