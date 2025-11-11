<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

<<<<<<< HEAD
Route::get('/login', function () {
    return view('login');
});

=======
>>>>>>> a5f30bdb649415f4c8df1024e3625130eca19df0
Route::get('/dashboard', function () {
    return view('dashboard');
});