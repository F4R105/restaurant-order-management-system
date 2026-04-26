<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
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

Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/orders', 'index')->name('orders.index');
    Route::get('/orders/{order}', 'show')->name('orders.show');
    Route::get('/orders/create', 'create')->name('orders.create');
    Route::post('/orders/store', 'store')->name('orders.store');
    Route::patch('/orders/{order}', 'update')->name('orders.update');
});

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users/store', 'store')->name('users.store');
    Route::get('/users/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
});

Route::controller(CartController::class)->middleware('auth')->group(function () {
    Route::get('/cart/add/{item}', 'add')->name('cart.add');
});
