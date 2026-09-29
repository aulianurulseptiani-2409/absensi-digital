<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ScanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/qr', [QrController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/classes', [ClassController::class, 'index']);

Route::get('/attendance', [AttendanceController::class, 'index']);

Route::post('/attendance/status', [AttendanceController::class, 'updateStatus']);

Route::get('/scan', [ScanController::class, 'index']);

Route::post('/scan/process', [ScanController::class, 'process']);