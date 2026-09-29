<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::withCount('students')
            ->orderBy('nama_kelas')
            ->get();

        return view('classes.index', compact('classes'));
    }
}