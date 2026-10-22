<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kelas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('admin.classes.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Nama Kelas
                        </label>

                        <input
                            type="text"
                            name="nama_kelas"
                            value="{{ old('nama_kelas') }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            placeholder="Contoh: XII RPL 1"
                        >

                        @error('nama_kelas')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('admin.classes.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                            Kembali
                        </a>

                        <button type="submit" style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 8px; border: none;">
    Simpan
</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>