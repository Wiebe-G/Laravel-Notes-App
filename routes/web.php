<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NotesController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::post('/notes', [NotesController::class, 'store']);
});

// Registratie
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');

// Uitloggen
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

// Inloggen
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('login', Login::class)
    ->middleware('guest');
