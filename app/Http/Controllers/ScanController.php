<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\QrToken;
use App\Models\Student;

class ScanController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('nama')->get();

        return view('scan.index', compact('students'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'student_id' => 'required|integer',
        ]);

        $qrToken = QrToken::where('token', $request->token)
            ->where('status', true)
            ->first();

        if (!$qrToken) {
            return back()->with('error', 'QR tidak valid atau sudah tidak aktif.');
        }

        $student = Student::find($request->student_id);

        if (!$student) {
            return back()->with('error', 'Siswa tidak ditemukan.');
        }

        $sudahAbsen = Attendance::where('student_id', $student->id)
            ->whereDate('tanggal', now()->toDateString())
            ->exists();

        if ($sudahAbsen) {
            return back()->with('error', $student->nama . ' sudah absen hari ini.');
        }

        Attendance::create([
            'student_id' => $student->id,
            'tanggal' => now()->toDateString(),
            'waktu' => now()->format('H:i:s'),
            'status' => 'hadir',
            'qr_location_id' => $qrToken->qr_location_id,
        ]);

        return back()->with(
            'success',
            'Absensi berhasil! ' . $student->nama . ' tercatat HADIR.'
        );
    }
}