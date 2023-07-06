<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\HelpdeskTicketHelpdeskController;
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
    return view('welcome');
});

Route::get('/get-tickets', function () {
    $tickets = Ticketing::all(); // Mengambil semua data ticket dari database

    return response()->json($tickets);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard-admin', [DashboardController::class, 'index']);

});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);  
    
});
Route::get('/helpdesk-ticket-helpdesk', [HelpdeskTicketHelpdeskController::class, 'index']);
Route::post('/helpdesk-ticket-helpdesk', [HelpdeskTicketHelpdeskController::class, 'store'])-> name('helpdesk');

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

Route::get('/location-setting', [LocationController::class, 'index']);
Route::post('/location-setting', [LocationController::class, 'store']);
Route::get('datalocation', [LocationController::class, 'getLocation'])->name('getlocation');

Route::get('/user-setting', [UserSettingController::class, 'index']);
Route::post('/user-setting', [UserSettingController::class, 'store']);
Route::get('datausersetting', [UserSettingController::class, 'getUsersetting'])->name('getusersetting');

Route::get('/profile-admin', function () {
    return view('profile-admin');
});

Route::get('/profile-helpdesk', function () {
    return view('profile-helpdesk');
});

Route::get('/profile-teknisi', function () {
    return view('profile-teknisi');
});