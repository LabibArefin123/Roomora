<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    HomeController::class,
    'index',
])->name('home');

Route::get('/rooms', [
    RoomController::class,
    'index',
])->name('rooms.index');

Route::get('/rooms/{room}', [
    RoomController::class,
    'show',
])->name('rooms.show');

Route::get('/bookings', [
    BookingController::class,
    'index',
])->name('bookings.index');

Route::get('/bookings/create', [
    BookingController::class,
    'create',
])->name('bookings.create');

Route::post('/bookings', [
    BookingController::class,
    'store',
])->name('bookings.store');

Route::get('/bookings/{booking}', [
    BookingController::class,
    'show',
])->name('bookings.show');

Route::patch('/bookings/{booking}/status', [
    BookingController::class,
    'updateStatus',
])->name('bookings.status');

Route::get('/customers', [
    CustomerController::class,
    'index',
])->name('customers.index');

Route::get('/customers/create', [
    CustomerController::class,
    'create',
])->name('customers.create');

Route::post('/customers', [
    CustomerController::class,
    'store',
])->name('customers.store');

Route::get('/customers/{customer}', [
    CustomerController::class,
    'show',
])->name('customers.show');

Route::patch('/customers/{customer}', [
    CustomerController::class,
    'update',
])->name('customers.update');
