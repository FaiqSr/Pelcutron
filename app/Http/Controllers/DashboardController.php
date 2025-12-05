<?php

namespace App\Http\Controllers;

use App\Models\Alat;

class DashboardController extends Controller
{

    protected $firebase;

    function __construct()
    {
        $this->firebase = [
            'apiKey' => env('FIREBASE_API_KEY'),
            'authDomain' => env('FIREBASE_AUTH_DOMAIN'),
            'databaseURL' => env('FIREBASE_DATABASE_URL'),
            'projectId' => env('FIREBASE_PROJECT_ID'),
            'storageBucket' => env('FIREBASE_STORAGE_BUCKET'),
            'messagingSenderId' => env('FIREBASE_MESSAGING_SENDER_ID'),
            'appId' => env('FIREBASE_APP_ID'),
            'measurementId' => env('FIREBASE_MEASUREMENT_ID'),
        ];
    }

    public function index()
    {
        $alats = Alat::get();
        $firebase = $this->firebase;
        return view('dashboard', compact('alats', 'firebase'));
    }

    public function showHistories()
    {
        $alats = Alat::get();
        $firebase = $this->firebase;
        return view('dashboard-history', compact('alats', 'firebase'));
    }
}
