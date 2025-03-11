<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;




// Redirect root URL to login page
Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Protected Routes for Admin
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Middleware Protected Routes for User
Route::middleware(['auth.user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

// Feedback Routes
Route::get('/feedback', function () {
    return view('feedback'); // feedback.blade.php in views folder
})->name('feedback');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Password Reset Routes old
//Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
//Route::post('/forgot-password', [ForgotPasswordController::class, 'validateUser'])->name('password.validate');
//Route::get('/reset-password/{user}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
//Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

// Password Reset Routes New

// Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'validateUser'])->name('password.validate');

// Reset Password Routes
Route::get('/reset-password/{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');





// Dashboard Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin Routes with Prefix (Protected)
Route::prefix('admin')->middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/calculate-ratings', [RatingController::class, 'calculateRatings'])->name('calculate.ratings');
    Route::get('/ratings', [RatingController::class, 'showRatings'])->name('admin.ratings');
});
