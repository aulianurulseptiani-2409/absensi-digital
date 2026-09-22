<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Models\Student;


// ==================== USER ====================

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ==================== ATTENDANCE ====================

Route::post('/attendance/scan', [AttendanceController::class, 'scan']);

Route::middleware('auth:sanctum')->get(
    '/attendance/history',
    [AuthController::class, 'attendanceHistory']
);


// ==================== STUDENT ====================

Route::get('/student/1', function () {
    $student = Student::with([
        'schoolClass',
        'user'
    ])->find(1);

    return response()->json($student);
});

Route::get('/student/1/attendance', function () {
    $student = Student::with('attendances')->find(1);

    return response()->json([
        'student' => $student,
        'attendance' => $student?->attendances ?? [],
    ]);
});