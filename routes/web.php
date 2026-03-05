<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing'); // default Laravel landing page
});

Route::get('/history', function () {
    return view('history'); // history page
});

Route::get('/about', function () {
    return view('about'); // about page with Our Team
});

Route::get('/dashboard', function () {
    return view('dashboard'); // you can create this view
});

