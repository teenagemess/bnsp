<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Data Pinjam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('registrasi.store') }}">
                        @csrf

                        <div class="space-y-4">
                            <!-- Nama -->
                            <div>
                                <x-input-label for="nama" :value="__('Nama')" />
                                <x-text-input id="nama" class="block w-full mt-1" type="text" name="nama" value="{{ old('nama') }}" required />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" value="{{ old('email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Alamat -->
                            <div>
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-text-input id="alamat" class="block w-full mt-1" type="text" name="alamat" value="{{ old('alamat') }}" />
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            {{-- <!-- Agama (Select) -->
                            <div>
                                <x-input-label for="agama" :value="__('Agama')" />
                                <select id="agama" name="agama" class="block w-full mt-1 bg-transparent">
                                    <option value="" class="text-black">Pilih Agama</option>
                                    @foreach($agama as $item)
                                        <option class="text-black" value="{{ $item->nama_agama }}" {{ old('agama') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                            </div> --}}

                            <!-- Buku (Select) -->
                            <div>
                                <x-input-label for="buku" :value="__('Buku')" />
                                <select id="buku" name="buku" class="block w-full mt-1 bg-transparent">
                                    <option class="text-black" value="">Pilih Buku</option>
                                    @foreach($buku as $item)
                                        <option class="text-black" value="{{ $item->id }}" {{ old('buku') == $item->id ? 'selected' : '' }}>{{ $item->judul }} (Stok: {{ $item->stok }})</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('buku')" class="mt-2" />
                            </div>

                            <!-- No HP -->
                            <div>
                                <x-input-label for="no_hp" :value="__('No. HP')" />
                                <x-text-input id="no_hp" class="block w-full mt-1" type="text" name="no_hp" value="{{ old('no_hp') }}" />
                                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                            </div>

                            <!-- Tanggal Lahir (Date) -->
                            {{-- <div>
                                <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
                                <x-text-input id="tgl_lahir" class="block w-full mt-1" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" />
                                <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
                            </div> --}}

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
