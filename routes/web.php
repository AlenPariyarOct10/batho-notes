<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// Default route
Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

// Authentication routes
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::group(['prefix'=>'create'],function(){
   Route::get('/notebook', function () {
       return view('notebook.create');
   });
});

Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');

// Register form submission (POST request)
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
