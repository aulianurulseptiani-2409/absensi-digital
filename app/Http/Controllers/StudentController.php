<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $classes = ClassModel::orderBy('nama_kelas')->get();

        $students = Student::with(['schoolClass', 'user'])
            ->when($request->class_id, function ($query) use ($request) {
                $query->where('class_id', $request->class_id);
            })
            ->orderBy('nama')
            ->get();

        return view('students.index', compact('students', 'classes'));
    }
}