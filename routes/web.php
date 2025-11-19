<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard-history', function () {
    return view('dashboard-history');
});


// ========== REALTIME DATA ==========
Route::get('/data-realtime', function () {
    return response()->json([
        'rpm' => rand(900, 1500),
        'berat' => rand(10, 40) / 10,
        'watt' => rand(60, 120),
        'rupiah' => rand(200, 600),
    ]);
});


// ========== HISTORY REALTIME ==========
Route::get('/history-realtime', function () {

    // contoh generate data dummy 10 baris
    $history = [];

    for ($i = 0; $i < 10; $i++) {
        $history[] = [
            'timestamp' => now()->subSeconds($i * 3)->format('Y-m-d H:i:s'),
            'rpm' => rand(900, 1500),
            'berat' => rand(10, 40) / 10,
            'watt' => rand(60, 120),
            'rupiah' => rand(200, 600),
        ];
    }

    return response()->json($history);
});
