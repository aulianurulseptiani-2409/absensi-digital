<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\QrToken;
use App\Models\Student;
use App\Models\QrLocation;
use App\Models\ClassModel;

class AttendanceController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'student_id' => 'required|integer',
        ]);

        // Cari token QR
        $qrToken = QrToken::where(
            'token',
            $request->token
        )->first();

        if (!$qrToken) {
            return response()->json([
                'message' => 'Token QR tidak ditemukan',
            ], 404);
        }

        // Cari siswa
        $student = Student::find(
            $request->student_id
        );

        if (!$student) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        // Cari lokasi QR
        $qrLocation = QrLocation::find(
            $qrToken->qr_location_id
        );

        if (!$qrLocation) {
            return response()->json([
                'message' => 'Lokasi QR tidak ditemukan',
            ], 404);
        }

        // Cek lokasi aktif
        if (!$qrLocation->status) {
            return response()->json([
                'message' => 'Lokasi QR sedang tidak aktif',
            ], 422);
        }

        // Cek siswa sudah absen hari ini
        $sudahAbsen = Attendance::where(
            'student_id',
            $student->id
        )
        ->whereDate(
            'tanggal',
            now()->toDateString()
        )
        ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'message' => 'Siswa sudah melakukan absensi hari ini',
            ], 422);
        }

        // Cek token aktif
        if (!$qrToken->status) {
            return response()->json([
                'message' => 'Token QR sedang tidak aktif',
            ], 422);
        }

        // Cek waktu token
        $sekarang = now()->format('H:i:s');

        if (
            $sekarang < $qrToken->waktu_mulai ||
            $sekarang > $qrToken->waktu_berakhir
        ) {
            return response()->json([
                'message' =>
                    'Token QR sudah tidak berlaku pada waktu sekarang',
            ], 422);
        }

        // Cek tanggal token
        if (
            $qrToken->tanggal !=
            now()->toDateString()
        ) {
            return response()->json([
                'message' =>
                    'Token QR bukan untuk tanggal hari ini',
            ], 422);
        }

        // Simpan absensi dari QR
        $attendance = Attendance::create([
            'student_id' => $student->id,
            'tanggal' => now()->toDateString(),
            'waktu' => $sekarang,
            'status' => 'hadir',
            'qr_location_id' => $qrToken->qr_location_id,
            'token' => $qrToken->token,
        ]);

        return response()->json([
            'message' => 'Absensi berhasil disimpan',
            'attendance_id' => $attendance->id,
            'student_id' => $attendance->student_id,
            'tanggal' => $attendance->tanggal,
            'waktu' => $attendance->waktu,
            'status' => $attendance->status,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN DATA ABSENSI
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        // Kalau tanggal tidak dipilih,
        // gunakan tanggal hari ini
        $tanggal = $request->tanggal ?? now()->toDateString();

        // Ambil semua kelas
        $classes = ClassModel::orderBy('nama_kelas')->get();

        // Ambil semua siswa
        $students = Student::with([
            'schoolClass',
            'user'
        ])
        ->when($request->class_id, function ($query) use ($request) {
            $query->where('class_id', $request->class_id);
        })
        ->orderBy('class_id')
        ->orderBy('nama')
        ->get();

        // Ambil absensi pada tanggal yang dipilih
        $attendances = Attendance::whereDate(
            'tanggal',
            $tanggal
        )
        ->get()
        ->keyBy('student_id');

        // Hitung status
        $jumlahHadir = $attendances
            ->where('status', 'hadir')
            ->count();

        $jumlahIzin = $attendances
            ->where('status', 'izin')
            ->count();

        $jumlahSakit = $attendances
            ->where('status', 'sakit')
            ->count();

        $jumlahAlpa = $attendances
            ->where('status', 'alpa')
            ->count();

        return view('attendance.index', compact(
            'students',
            'classes',
            'attendances',
            'tanggal',
            'jumlahHadir',
            'jumlahIzin',
            'jumlahSakit',
            'jumlahAlpa'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN / UPDATE STATUS ABSENSI
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        $student = Student::find($request->student_id);

        if (!$student) {
            return redirect()
                ->back()
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        // Cari absensi siswa pada tanggal tersebut
        $attendance = Attendance::where(
            'student_id',
            $student->id
        )
        ->whereDate(
            'tanggal',
            $request->tanggal
        )
        ->first();

        if ($attendance) {

            // Kalau sudah ada, cukup ubah status
            $attendance->status = $request->status;
            $attendance->save();

        } else {

            // Kalau belum ada, buat data absensi baru
            Attendance::create([
                'student_id' => $student->id,
                'tanggal' => $request->tanggal,
                'waktu' => now()->format('H:i:s'),
                'status' => $request->status,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Status absensi berhasil diperbarui.');
    }
}