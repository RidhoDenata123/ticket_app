<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserTicketController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('home');
 


});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    Route::resource('/admin/tujuan', TujuanController::class);
    Route::resource('/admin/kendaraan', KendaraanController::class);
    Route::resource('/admin/jadwal', JadwalController::class);

    Route::resource('/admin/ticket', TicketController::class);
    Route::get('/admin/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/admin/ticket/{id}/confirm', [TicketController::class, 'confirm'])->name('ticket.confirm');
    Route::get('/admin/ticket/{id}/cancel', [TicketController::class, 'cancel'])->name('ticket.cancel');
    

    Route::get('/get-ticket-price/{kode_tujuan}', [TicketController::class, 'getTicketPrice']);
    Route::get('/get-cost-kendaraan/{kode_kendaraan}', [TicketController::class, 'getCostKendaraan']);
});

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});