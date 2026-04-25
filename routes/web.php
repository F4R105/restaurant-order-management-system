<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::controller(ItemController::class)->middleware('auth')->group(function () {
    Route::get('/items', 'index')->name('items.index');
    Route::get('/items/create', 'create')->name('items.create');
    Route::get('/items/{item}', 'show')->name('items.show');
    Route::post('/items', 'store')->name('items.store');
    Route::get('/items/{item}/edit', 'edit')->name('items.edit');
    Route::put('/items/{item}', 'update')->name('items.update');
    Route::delete('/items/{item}', 'destroy')->name('items.destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders.index');
    Route::get('/orders/create', 'create')->name('orders.create');
    Route::get('/orders/{order}', 'show')->name('orders.show');
    Route::post('/orders/store', 'store')->name('orders.store');
});
