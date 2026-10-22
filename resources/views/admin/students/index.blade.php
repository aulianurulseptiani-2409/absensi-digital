<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Siswa
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
                        Daftar Siswa
                    </h3>

                    <a href="{{ route('admin.students.create') }}"
                       style="background-color:#2563eb;color:white;padding:8px 16px;border-radius:8px;">
                        + Tambah Siswa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-3">No</th>
                                <th class="text-left p-3">NIS</th>
                                <th class="text-left p-3">Nama</th>
                                <th class="text-left p-3">Kelas</th>
                                <th class="text-left p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($students as $student)
                                <tr class="border-b">
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3">{{ $student->nis }}</td>
                                    <td class="p-3">{{ $student->nama }}</td>
                                    <td class="p-3">
                                        {{ $student->schoolClass->nama_kelas ?? '-' }}
                                    </td>
                                    <td class="p-3">
                                        <a href="{{ route('admin.students.edit', $student->id) }}"
                                           class="text-blue-600 mr-3">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.students.destroy', $student->id) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600"
                                                    onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-gray-500">
                                        Belum ada data siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>