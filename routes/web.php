<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'location-setting'], function () {
        Route::get('/', [LocationController::class, 'index'])->name('location.index');
        Route::post('/', [LocationController::class, 'store'])->name('location.store');
        Route::post('/update', [LocationController::class, 'update'])->name('location.update');
        Route::get('/{location}/delete', [LocationController::class, 'delete'])->name('location.delete');
        Route::get('/data', [LocationController::class, 'getLocation'])->name('location.data');
    });
    
    Route::group(['prefix' => 'user-setting'], function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user-setting.index');
        Route::post('/', [UserSettingController::class, 'store'])->name('user-setting.store');
        Route::post('/update', [UserSettingController::class, 'update'])->name('user-setting.update');
        Route::get('/{userSetting}/delete', [UserSettingController::class, 'delete'])->name('user-setting.delete');
        Route::get('/data', [UserSettingController::class, 'getUsersetting'])->name('user-setting.data');
    });

    Route::group(['prefix' => 'ticket'], function () {
        Route::get('/', [TicketController::class, 'index'])->name('ticket.index');
        Route::post('/update', [TicketController::class, 'update'])->name('ticket.update');
        Route::get('/{ticket}/close', [TicketController::class, 'close'])->name('ticket.close');
        Route::get('/{ticket}/solve', [TicketController::class, 'solve'])->name('ticket.solve');
        Route::get('/{ticket}/detail', [TicketController::class, 'show'])->name('ticket.show');
        Route::post('/technician', [TicketController::class, 'assignTechnician'])->name('ticket.assignTechnician');
        Route::post('/', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('/data', [TicketController::class, 'getTickets'])->name('ticket.data');
        Route::get('/data-helpdesk', [TicketController::class, 'getHelpdeskTickets'])->name('ticket.data-helpdesk');
        Route::get('/data-technician', [TicketController::class, 'getTechnicianTickets'])->name('ticket.data-technician');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('/profile', [UserController::class, 'update'])->name('user.update');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::get('/{user}/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/data', [UserController::class, 'getUsers'])->name('user.data');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);  
});
