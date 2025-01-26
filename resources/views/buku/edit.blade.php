<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-4">
                            <!-- Judul Buku -->
                            <div>
                                <x-input-label for="judul" :value="__('Judul Buku')" />
                                <x-text-input id="judul" class="block w-full mt-1" type="text" name="judul" :value="old('judul', $buku->judul)" required autofocus />
                                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                            </div>

                            <!-- Penulis -->
                            <div>
                                <x-input-label for="penulis_id" :value="__('Penulis')" />
                                <select id="penulis_id" name="penulis_id" class="block w-full mt-1" required>
                                    <option value="">Pilih Penulis</option>
                                    @foreach ($penulis as $item)
                                        <option value="{{ $item->id }}" {{ old('penulis_id', $buku->penulis_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('penulis_id')" class="mt-2" />
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control"
                                               value="{{ old('stok', $buku->stok ?? 0) }}" min="0">
                                    </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
