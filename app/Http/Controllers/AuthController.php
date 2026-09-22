<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah',
            ], 401);
        }

        $token = $user->createToken('mobile-app')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }

    public function profile(Request $request)
{
    $user = $request->user();

    $student = $user->student;

    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'role' => $user->role,
        'student' => $student ? [
            'nis' => $student->nis,
            'nama' => $student->nama,
            'kelas' => $student->schoolClass->nama_kelas ?? null,
        ] : null,
    ]);
}

public function todayAttendance(Request $request)
{
    $student = $request->user()->student;

    if (!$student) {
        return response()->json([
            'message' => 'Data siswa tidak ditemukan',
        ], 404);
    }

    $attendance = $student->attendances()
        ->whereDate('tanggal', now()->toDateString())
        ->first();

    return response()->json([
        'tanggal' => now()->toDateString(),
        'sudah_absen' => $attendance ? true : false,
        'attendance' => $attendance ? [
            'waktu' => $attendance->waktu,
            'status' => $attendance->status,
        ] : null,
    ]);
}

public function attendanceHistory(Request $request)
{
    $student = $request->user()->student;

    if (!$student) {
        return response()->json([
            'message' => 'Data siswa tidak ditemukan',
        ], 404);
    }

    $attendance = $student->attendances()
        ->orderBy('tanggal', 'desc')
        ->orderBy('waktu', 'desc')
        ->get();

    return response()->json([
        'data' => $attendance,
    ]);
}

}