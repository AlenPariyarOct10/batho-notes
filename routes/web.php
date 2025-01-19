<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Logout route
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
    Route::get('/notebook/create', [\App\Http\Controllers\User\NoteBookController::class, 'create'])->name('notebook.create');
    Route::post('/notebook/create', [\App\Http\Controllers\User\NoteBookController::class, 'store'])->name('notebook.create');
    Route::get('/notebook/edit/{slug}', [\App\Http\Controllers\User\NoteBookController::class, 'edit'])->name('notebook.edit');
    Route::post('/notebook/edit/{id}', [\App\Http\Controllers\User\NoteBookController::class, 'update'])->name('notebook.update');
    Route::delete('/notebook/{id}', [\App\Http\Controllers\User\NoteBookController::class, 'destroy'])->name('notebook.delete');
    Route::get('/notebook', [\App\Http\Controllers\User\NoteBookController::class, 'index'])->name('notebook.index');
});

// Guest-only routes (prevent access for authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');

    Route::get('/auth/register', function () {
        return view('auth.register');
    })->name('auth.register');

    Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
});
