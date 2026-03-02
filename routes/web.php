<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // default Laravel welcome page
});

Route::get('/dashboard', function () {
    return view('dashboard'); // you can create this view
});

