<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Lokasi QR
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('admin.qr-locations.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Nama Lokasi
                        </label>
                        <input type="text"
                               name="nama_lokasi"
                               value="{{ old('nama_lokasi') }}"
                               placeholder="Contoh: Gerbang Sekolah"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('nama_lokasi')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Kode Lokasi
                        </label>
                        <input type="text"
                               name="kode_lokasi"
                               value="{{ old('kode_lokasi') }}"
                               placeholder="Contoh: GERBANG-01"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('kode_lokasi')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Latitude
                        </label>
                        <input type="text"
                               name="latitude"
                               value="{{ old('latitude') }}"
                               placeholder="Contoh: -6.123456"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('latitude')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Longitude
                        </label>
                        <input type="text"
                               name="longitude"
                               value="{{ old('longitude') }}"
                               placeholder="Contoh: 106.123456"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('longitude')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Radius (meter)
                        </label>
                        <input type="number"
                               name="radius"
                               value="{{ old('radius', 50) }}"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('radius')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('admin.qr-locations.index') }}"
                           style="background-color:#6b7280;color:white;padding:8px 16px;border-radius:8px;">
                            Kembali
                        </a>

                        <button type="submit"
                                style="background-color:#2563eb;color:white;padding:8px 16px;border-radius:8px;">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>