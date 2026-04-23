<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'logout')->name('auth.logout');
});
