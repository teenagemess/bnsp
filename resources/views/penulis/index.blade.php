<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Data Penulis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-create-button href="{{ route('penulis.create') }}" />

                                                                        <!-- Form Pencarian -->

                        </div>
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}
                                </p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}
                                </p>
                            @endif
                        </div>

                        <form method="GET" action="{{ route('penulis.index') }}" class="mt-4">
                            <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Cari berdasarkan judul..." class="px-4 py-2 text-black bg-transparent border rounded-md dark:text-white" />
                            <button type="submit" class="px-4 py-2 ml-2 text-white bg-gray-600 rounded-md">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama Penulis</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penulis as $pen)
                                <tr class="bg-white dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <a href="{{ route('penulis.edit', $pen) }}" class="hover:underline">{{ $pen->nama }}</a>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <form action="{{ route('penulis.destroy', $pen) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400">
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('penulis.edit', $pen->id) }}">
                                            <button type="submit" class="text-green-600">
                                                Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="5" class="px-6 py-4 font-medium text-gray-900 dark:text-white">Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                                       <!-- Menambahkan link pagination di bawah tabel -->
                                       <div class="mt-4">
                                        {{ $penulis->links() }}
                                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
