<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\QrLocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard');

Route::get('/student-dashboard', [StudentDashboardController::class, 'index'])
    ->middleware(['auth', 'role:siswa'])
    ->name('student.dashboard');

Route::resource('admin/classes', ClassController::class)
    ->middleware(['auth', 'role:admin'])
    ->names('admin.classes');

Route::resource('admin/students', StudentController::class)
    ->middleware(['auth', 'role:admin'])
    ->names('admin.students');

Route::resource('admin/qr-locations', QrLocationController::class)
    ->middleware(['auth', 'role:admin'])
    ->names('admin.qr-locations');

Route::get('/admin/qr-locations/{qr_location}/qr', [QrLocationController::class, 'qr'])
    ->name('admin.qr-locations.qr');

Route::get('/admin/attendance', [\App\Http\Controllers\Admin\AttendanceController::class, 'index'])
    ->name('admin.attendance.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
