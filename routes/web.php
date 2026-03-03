<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing'); // default Laravel landing page
});

Route::get('/dashboard', function () {
    return view('dashboard'); // you can create this view
});

