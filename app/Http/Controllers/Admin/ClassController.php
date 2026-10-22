<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::latest()->paginate(10);

        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
        ]);

        ClassModel::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $class = ClassModel::findOrFail($id);

        return view('admin.classes.show', compact('class'));
    }

    public function edit(string $id)
    {
        $class = ClassModel::findOrFail($id);

        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}