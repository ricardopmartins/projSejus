<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('games');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});
