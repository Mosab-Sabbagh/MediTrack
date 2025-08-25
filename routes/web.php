<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', action: function () {
    return view('Auth.login');
})->name('login');

Route::get('/forgot-password', action: function () {
    return view('auth.forgot-password');
})->name('forgot-password');