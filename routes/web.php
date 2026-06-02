<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth.session')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.detail');

    Route::get('/quiz', function () {
        return view('quiz');
    })->name('quiz');

    Route::get('/simulasi', function () {
        return view('simulasi');
    })->name('simulasi');

    Route::get('/hasil', function () {
        return view('hasil');
    })->name('hasil');
});

