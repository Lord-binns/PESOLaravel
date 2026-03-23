<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/jobs', function () {
    $totalJobs = 127;
    $newJobs = 23;
    $jobs = collect([
        (object)['id' => 1, 'title' => 'Software Developer', 'company' => 'ABC Tech', 'location' => 'Manolo Fortich', 'salary_min' => 25000, 'salary_max' => 35000, 'employment_type' => 'full_time', 'created_at' => now()],
        (object)['id' => 2, 'title' => 'Customer Service Rep', 'company' => 'CallCenter Pro', 'location' => 'Manolo Fortich', 'salary_min' => 15000, 'salary_max' => 20000, 'employment_type' => 'full_time', 'created_at' => now()->subDay()],
        // Add 10 more sample jobs...
    ])->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1, 12);
    return view('jobs', compact('jobs', 'totalJobs', 'newJobs'));
})->name('jobs');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/republic-acts', function () {
    return view('republic-acts');
})->name('republic-acts');

// Admin Routes - Dashboard is the main admin dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/pending', [AdminController::class, 'pendingJobs'])->name('admin.pending');
Route::get('/admin/archive', [AdminController::class, 'archive'])->name('admin.archive');
Route::post('/admin/job/{id}/approve', [AdminController::class, 'approveJob'])->name('admin.job.approve');
Route::post('/admin/job/{id}/reject', [AdminController::class, 'rejectJob'])->name('admin.job.reject');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/employer/profile', [EmployerController::class, 'profile'])->name('employer.profile');

// Employer Routes
Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
Route::get('/employer/post-job', [EmployerController::class, 'showPostJob'])->name('employer.post-job');
Route::post('/employer/post-job', [EmployerController::class, 'storeJobPost'])->name('employer.post-job.store');
Route::get('/employer/archive', [EmployerController::class, 'showArchive'])->name('employer.archive');
Route::post('/employer/job/{id}/archive', [EmployerController::class, 'archiveJob'])->name('employer.job.archive');
Route::post('/employer/archive/{id}/restore', [EmployerController::class, 'restoreJob'])->name('employer.archive.restore');
Route::post('/employer/archive/{id}/delete', [EmployerController::class, 'deleteArchivedJob'])->name('employer.archive.delete');

Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');

Route::get('/admin/settings', [AdminController::class, 'showSettings'])->name('admin.settings');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    return redirect()->route('landing');
})->name('logout.get');
