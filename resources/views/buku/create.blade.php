<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <!-- Judul -->
                            <div>
                                <x-input-label for="judul" :value="__('Judul Buku')" />
                                <x-text-input id="judul" class="block w-full mt-1" type="text" name="judul" :value="old('judul')" required autofocus />
                                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="penerbit" :value="__('Penerbit')" />
                                <x-text-input id="penerbit" class="block w-full mt-1" type="text" name="penerbit" :value="old('penerbit')" required autofocus />
                                <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
                            </div>

                            <!-- Penulis -->
                            <div>
                                <x-input-label for="penulis_id" :value="__('Penulis')" />
                                <select id="penulis_id" name="penulis_id" class="block w-full mt-1" required>
                                    <option value="" class="text-black">Pilih Penulis</option>
                                    @foreach ($penulis as $item)
                                        <option class="text-black" value="{{ $item->id }}" {{ old('penulis_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('penulis_id')" class="mt-2" />
                            </div>

                            <!-- Stok -->
                            <div class="mt-6 form-group">
                                <x-input-label for="stok" :value="__('Stok')" />
                                <x-text-input id="stok" class="block w-full mt-1" type="number" name="stok" value="{{ old('stok', 0) }}" min="0" />
                                <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                            </div>

                            <!-- Tahun Terbit -->
                                <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                                <x-text-input id="tahun_terbit" class="block w-full mt-1" type="date" name="tahun_terbit" value="{{ old('tahun_terbit') }}" />
                                <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-2" />
                            </div>

                            <!-- Gambar -->
                            <div>
                                <x-input-label for="image" :value="__('Gambar Buku')" />
                                <input id="image" type="file" name="image" class="block w-full mt-1 text-gray-800 dark:text-gray-200 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
