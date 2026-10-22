<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Siswa
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            NIS
                        </label>

                        <input type="text"
                               name="nis"
                               value="{{ old('nis', $student->nis) }}"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('nis')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Nama Siswa
                        </label>

                        <input type="text"
                               name="nama"
                               value="{{ old('nama', $student->nama) }}"
                               class="mt-1 block w-full rounded-md border-gray-300">

                        @error('nama')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Kelas
                        </label>

                        <select name="class_id"
                                class="mt-1 block w-full rounded-md border-gray-300">

                            <option value="">-- Pilih Kelas --</option>

                            @foreach($classes as $class)
                                <option value="{{ $class->id }}"
                                    {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                                    {{ $class->nama_kelas }}
                                </option>
                            @endforeach

                        </select>

                        @error('class_id')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex gap-3">

                        <a href="{{ route('admin.students.index') }}"
                           style="background-color:#6b7280;color:white;padding:8px 16px;border-radius:8px;">
                            Kembali
                        </a>

                        <button type="submit"
                                style="background-color:#2563eb;color:white;padding:8px 16px;border-radius:8px;">
                            Update
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>