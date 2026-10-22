<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('schoolClass')
            ->latest()
            ->paginate(20);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $classes = ClassModel::orderBy('nama_kelas')->get();

        return view('admin.students.create', compact('classes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nis' => 'required|unique:students,nis',
        'nama' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);

    $user = User::create([
        'name' => $request->nama,
        'email' => $request->nis . '@siswa.com',
        'password' => Hash::make('12345678'),
        'role' => 'siswa',
    ]);

    Student::create([
        'user_id' => $user->id,
        'nis' => $request->nis,
        'nama' => $request->nama,
        'class_id' => $request->class_id,
    ]);

    return redirect()
        ->route('admin.students.index')
        ->with('success', 'Data siswa berhasil ditambahkan.');
}

    public function show(string $id)
    {
        $student = Student::with('schoolClass')->findOrFail($id);

        return view('admin.students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $classes = ClassModel::orderBy('nama_kelas')->get();

        return view('admin.students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'nama' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'class_id' => $request->class_id,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}