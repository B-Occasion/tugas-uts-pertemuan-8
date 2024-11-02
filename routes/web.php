<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
use GrahamCampbell\ResultType\Success;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('restricted', function () {
    // Check if session is properly set
    session()->flash('success', 'You are of age');
    return view('auth.dashboard');
})->middleware('checkage');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('buku', BukuController::class);
    Route::resource('users', UserController::class);
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/about', function () {
    return view('about', [
        "name" => "lala",
        "email" => "lala@gmail.com"
    ]);
})->name('about');

Route::get('/master', function () {
    return view('master');
});


