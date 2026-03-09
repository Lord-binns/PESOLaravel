<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('landing');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/about', function () {
    return view('about');
});

// Dashboard Routes
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/employer/dashboard', function () {
    return view('employer-dashboard');
});

Route::get('/employee/dashboard', function () {
    return view('employee-dashboard');
});

Route::get('/settings', function () {
    return view('settings');
});

// Authentication Routes - Separate Login and Register Pages
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// POST routes for form submission (UI only - placeholder behavior)
Route::post('/login', function () {
    return redirect('/dashboard');
})->name('login.post');

Route::post('/register', function () {
    return redirect('/login');
})->name('register.post');

Route::post('/logout', function () {
    return redirect('/');
})->name('logout');

// Example of protected route (requires authentication)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');
