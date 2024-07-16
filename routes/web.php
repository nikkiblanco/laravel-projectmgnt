<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () { return view('login'); });

    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'loginUser'])->name('login-user');
    
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerUser'])->name('register-user');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [DashboardController::class, 'logoutUser'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  
    Route::resource('/project', ProjectController::class);
    Route::resource('/task', TaskController::class);
});