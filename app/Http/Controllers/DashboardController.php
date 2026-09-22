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
            'tanggal',
            now()->toDateString()
        )->count();

        return view('dashboard', compact(
            'jumlahSiswa',
            'jumlahKelas',
            'absensiHariIni'
        ));
    }
}