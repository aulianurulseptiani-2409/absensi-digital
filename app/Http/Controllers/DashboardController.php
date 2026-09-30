<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Student::count();
        $jumlahKelas = ClassModel::count();

        $absensiHariIni = Attendance::whereDate(
            'attendance_date',
            now()->toDateString()
        )->count();

        return view('dashboard', compact(
            'jumlahSiswa',
            'jumlahKelas',
            'absensiHariIni'
        ));
    }
}