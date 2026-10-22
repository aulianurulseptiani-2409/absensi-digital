<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Kelas
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
                        Daftar Kelas
                    </h3>

                    <a href="{{ route('admin.classes.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        + Tambah Kelas
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="text-left p-3">No</th>
                                <th class="text-left p-3">Nama Kelas</th>
                                <th class="text-left p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($classes as $class)
                                <tr class="border-b">
                                    <td class="p-3">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="p-3">
                                        {{ $class->nama_kelas }}
                                    </td>

                                    <td class="p-3">
                                        <a href="{{ route('admin.classes.edit', $class->id) }}"
                                           class="text-blue-600 mr-3">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.classes.destroy', $class->id) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600"
                                                    onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-6 text-center text-gray-500">
                                        Belum ada data kelas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $classes->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>