<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lokasi QR
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">
                        Daftar Lokasi QR
                    </h3>

                    <a href="{{ route('admin.qr-locations.create') }}"
                       style="background-color:#2563eb;color:white;padding:8px 16px;border-radius:8px;">
                        + Tambah Lokasi
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-3">No</th>
                                <th class="text-left p-3">Nama Lokasi</th>
                                <th class="text-left p-3">Kode</th>
                                <th class="text-left p-3">Latitude</th>
                                <th class="text-left p-3">Longitude</th>
                                <th class="text-left p-3">Radius</th>
                                <th class="text-left p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($locations as $location)
                                <tr class="border-b">
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3">{{ $location->nama_lokasi }}</td>
                                    <td class="p-3">{{ $location->kode_lokasi }}</td>
                                    <td class="p-3">{{ $location->latitude ?? '-' }}</td>
                                    <td class="p-3">{{ $location->longitude ?? '-' }}</td>
                                    <td class="p-3">{{ $location->radius ?? '-' }} m</td>

                                    <td class="p-3">
    <a href="{{ route('admin.qr-locations.qr', $location->id) }}"
       class="text-green-600 mr-3">
        Lihat QR
    </a>

    <a href="{{ route('admin.qr-locations.edit', $location->id) }}"
       class="text-blue-600 mr-3">
        Edit
    </a>

    <form action="{{ route('admin.qr-locations.destroy', $location->id) }}"
          method="POST"
          class="inline">
        @csrf
        @method('DELETE')

        <button type="submit"
                class="text-red-600"
                onclick="return confirm('Yakin ingin menghapus lokasi ini?')">
            Hapus
        </button>
    </form>
</td>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-6 text-center text-gray-500">
                                        Belum ada lokasi QR.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $locations->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>