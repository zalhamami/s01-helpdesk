<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\HelpdeskTicketHelpdeskController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\Models\Ticketing;

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
        Route::get('/data', [LocationController::class, 'getLocation'])->name('location.data');
    });
    
    Route::group(['prefix' => 'user-setting'], function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user-setting.index');
        Route::post('/', [UserSettingController::class, 'store'])->name('user-setting.store');
        Route::get('/data', [UserSettingController::class, 'getUsersetting'])->name('user-setting.data');
    });

    Route::group(['prefix' => 'ticket'], function () {
        Route::post('/', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('/data', [TicketController::class, 'getTickets'])->name('ticket.data');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);  
});

Route::get('/helpdesk-ticket-helpdesk', [HelpdeskTicketHelpdeskController::class, 'index']);
Route::post('/helpdesk-ticket-helpdesk', [HelpdeskTicketHelpdeskController::class, 'store'])->name('helpdesk');

Route::get('/dashboard-helpdesk', function () {
    return view('dashboard-helpdesk');
});

Route::get('/dashboard-teknisi', function () {
    return view('dashboard-teknisi');
});

Route::get('/helpdesk-ticket-edit', function () {
    return view('helpdesk-ticket-edit');
});

Route::get('/helpdesk-ticket-teknisi', function () {
    return view('helpdesk-ticket-teknisi');
});

Route::get('/helpdesk-ticket-solved', function () {
    return view('helpdesk-ticket-solved');
});

Route::get('/add-user', [RegisterController::class, 'index']);
Route::post('/add-user', [RegisterController::class, 'store']);
Route::get('dataregister', [RegisterController::class, 'getRegister'])->name('getregister');

Route::get('/create-new', function () {
    return view('create-new');
});

Route::get('/profile-admin', function () {
    return view('profile-admin');
});

Route::get('/profile-helpdesk', function () {
    return view('profile-helpdesk');
});

Route::get('/profile-teknisi', function () {
    return view('profile-teknisi');
});