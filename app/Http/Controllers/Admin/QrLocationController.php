<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrLocation;
use Illuminate\Http\Request;

class QrLocationController extends Controller
{
    public function index()
    {
        $locations = QrLocation::latest()->paginate(10);

        return view('admin.qr-locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.qr-locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'kode_lokasi' => 'required|string|max:50|unique:qr_locations,kode_lokasi',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'radius' => 'nullable|integer|min:1|max:500',
        ]);

        QrLocation::create([
            'nama_lokasi' => $request->nama_lokasi,
            'kode_lokasi' => $request->kode_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius,
            'status' => true,
        ]);

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $location = QrLocation::findOrFail($id);

        return view('admin.qr-locations.show', compact('location'));
    }

    public function edit(string $id)
    {
        $location = QrLocation::findOrFail($id);

        return view('admin.qr-locations.edit', compact('location'));
    }

    public function update(Request $request, string $id)
    {
        $location = QrLocation::findOrFail($id);

        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'kode_lokasi' => 'required|string|max:50|unique:qr_locations,kode_lokasi,' . $location->id,
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'radius' => 'nullable|integer|min:1|max:500',
        ]);

        $location->update([
            'nama_lokasi' => $request->nama_lokasi,
            'kode_lokasi' => $request->kode_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius,
        ]);

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $location = QrLocation::findOrFail($id);
        $location->delete();

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil dihapus.');
    }

public function qr(QrLocation $qr_location)
{
    $qrToken = $qr_location->qrTokens()
        ->whereDate('tanggal', now()->toDateString())
        ->where('status', true)
        ->first();

    return view('admin.qr-locations.qr', compact('qr_location', 'qrToken'));
}
}