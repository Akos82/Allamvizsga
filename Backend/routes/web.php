<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

// Auth oldalak (csak bejelentkezetlen felhasználóknak)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Védett oldalak – bejelentkezés szükséges
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => view('home'))->name('home');
    Route::get('/rolunk', fn() => redirect()->route('home'))->name('about');
    Route::get('/elerhetosegek', fn() => view('contact'))->name('contact');
    Route::get('/eloadasok', [ShowController::class, 'index'])->name('shows');
    Route::get('/foglalas',  [BookingController::class, 'index'])->name('booking');
    Route::post('/foglalas', [BookingController::class, 'store'])->name('booking.store');
});

// Nyelváltó
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['hu', 'ro'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back()->withHeaders(['Cache-Control' => 'no-store']);
})->name('language.switch');

// API a naptárhoz
Route::get('/api/foglalt-datumok', [BookingController::class, 'bookedDates'])->name('api.booked-dates');
