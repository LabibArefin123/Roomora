<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('rooms', RoomController::class);
Route::resource('bookings', BookingController::class);
Route::resource('customers', CustomerController::class);
Route::resource('profiles', ProfileController::class);
