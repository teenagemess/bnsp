<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Peminjam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('registrasi.update', $registrasi->id) }}">
                        @csrf
                        @method('patch')
                        <div class="space-y-4">
                            <!-- Nama -->
                            <div>
                                <x-input-label for="nama" :value="__('Nama')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" value="{{ old('nama', $registrasi->nama) }}" required />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $registrasi->email) }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Alamat -->
                            <div>
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" value="{{ old('alamat', $registrasi->alamat) }}" />
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <!-- Agama (Select) -->
                            <div>
                                <x-input-label for="agama" :value="__('Agama')" />
                                <select id="agama" name="agama" class="block mt-1 w-full">
                                    <option value="">Pilih Agama</option>
                                    @foreach($agama as $item)
                                        <option value="{{ $item->id }}" {{ old('agama', $registrasi->agama) == $item->id ? 'selected' : '' }}>{{ $item->nama_agama }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                            </div>

                            <!-- No HP -->
                            <div>
                                <x-input-label for="no_hp" :value="__('No. HP')" />
                                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ old('no_hp', $registrasi->no_hp) }}" />
                                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                            </div>

                            <!-- Tanggal Lahir (Date) -->
                            <div>
                                <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
                                <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $registrasi->tgl_lahir) }}" />
                                <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
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
