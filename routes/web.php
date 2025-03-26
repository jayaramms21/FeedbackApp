<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyMappingController;
use App\Http\Controllers\StaffController;


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
// temporary disacble *****************************
//Route::prefix('admin')->middleware(['auth.admin'])->group(function ()
Route::prefix('admin')->group(function () 
{
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/calculate-ratings', [RatingController::class, 'calculateRatings'])->name('admin.calculate-ratings');
   
   // Route::post('/storeStudent', [AdminController::class, 'storeStudent'])->name('admin.storeStudent');
    Route::get('/viewStudents', [AdminController::class, 'viewStudents'])->name('admin.viewStudents');
    
   // Route::get('/staff', [AdminController::class, 'staff'])->name('admin.staff');
   Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
   Route::post('/staff/store', [StaffController::class, 'store'])->name('admin.staff.store');
   


    Route::get('/batches', [AdminController::class, 'batches'])->name('admin.batches');
    

    Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/view', [CourseController::class, 'view'])->name('admin.courses.view');
    
    
    Route::get('/faculty-mapping', [FacultyMappingController::class, 'index'])->name('admin.facultyMapping');

// Store faculty mapping data
//Route::post('/faculty-mapping/store', [FacultyMappingController::class, 'store'])->name('admin.facultyMapping.store');
Route::post('/faculty-mapping/store', [FacultyMappingController::class, 'store'])->name('admin.facultyMapping.store');

    
//*****************.....UPDATE USER......************************/
//Route::get('/admin/update-user', [AdminController::class, 'updateUser'])->name('admin.updateUser');
//Route::get('/admin/add-student-user/{regno}', [AdminController::class, 'addStudentAsUser'])->name('admin.addStudentAsUser');

Route::get('/update-user', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::get('/add-student-user/{regno}', [AdminController::class, 'addStudentAsUser'])->name('admin.addStudentAsUser');
//Route::get('/add-student-user/{regno}', [AdminController::class, 'showStudentUserForm'])->name('admin.addStudentUser');
//Route::get('/student-user/{regno}', [AdminController::class, 'showStudentUserForm'])->name('admin.showStudentUserForm');

//Route::post('/store-student-user', [AdminController::class, 'storeStudentAsUser'])->name('admin.storeStudentAsUser');
//Route::get('/update-user/{regno}', [AdminController::class, 'showStudentUserForm'])
  //  ->name('admin.showStudentUserForm');

// Show Student User Form (with admin prefix)/*
//Route::get('/update-user/{regno}', [AdminController::class, 'showStudentUserForm'])->name('admin.showStudentUserForm');

// Store Student User
//Route::post('/store-student-user', [AdminController::class, 'storeStudentAsUser'])->name('admin.storeStudentAsUser');



    // Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses');
    // Route::post('/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    



  //  Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses');

 //   Route::get('/calculate-ratings', [RatingController::class, 'calculateRatings'])->name('calculate.ratings');
    Route::get('/ratings', [RatingController::class, 'showRatings'])->name('admin.ratings');

// new 
Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
    Route::post('/students', [AdminController::class, 'storeStudent'])->name('admin.storeStudent');
    
    Route::get('/staff', [AdminController::class, 'staff'])->name('admin.staff');
    Route::post('/admin/staff', [AdminController::class, 'storeStaff']);
    
    Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses');
    Route::post('/courses', [AdminController::class, 'storeCourse']);
    
    Route::get('/batches', [AdminController::class, 'batches'])->name('admin.batches');
    Route::post('/batches', [AdminController::class, 'storeBatch']);

    Route::get('/update-user', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::post('/update-user', [AdminController::class, 'updateUserData']);

    // fac -mapping 
    

//Route::get('/admin/faculty-mapping', [FacultyMappingController::class, 'index'])->name('admin.facultyMapping');
//Route::post('/faculty-mapping/store', [FacultyMappingController::class, 'store'])->name('facultyMapping.store');



});
// new 

//Route::middleware(['auth', 'admin'])->group(function () {
  //  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
//});
