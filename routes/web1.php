<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Define login submission route
Route::post('/login', function (Request $request) {
    // Validate input
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Placeholder: You can add authentication logic here
    return back()->with('success', 'Login request received.');
})->name('login.submit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
