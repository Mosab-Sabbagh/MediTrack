<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/sections', action: function () {
    return view('pages.sections');
})->name('sections');


Route::get('/connect_us', action: function () {
    return view('pages.connect_us');
})->name('connect_us');


Route::get('/first_aid', action: function () {
    return view('pages.first_aid');
})->name('first_aid');

Route::get('/register', action: function () {
    return view('Auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', action: function () {
    return view('Auth.login');
})->name('login');

Route::post('/login', [AuthenticatedController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedController::class, 'destroy'])->name('logout');

Route::get('/forgot-password', action: function () {
    return view('auth.forgot-password');
})->name('forgot-password');


Route::get('/doctor', function () {
    return view('doctor.index');
})->name('doctor');


Route::get('/sick', function () {
    return view('sick.index');
})->name('sick');


Route::get('/pharmaceutical', function () {
    return view('pharmaceutical.index');
})->name('pharmaceutical');