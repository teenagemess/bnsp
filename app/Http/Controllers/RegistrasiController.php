<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Agama;
use App\Models\Buku;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan query pencarian dari input pengguna
        $search = $request->input('search');

        // Mengambil data registrasi dengan pagination dan filter pencarian jika ada
        $data = Registrasi::when($search, function ($query, $search) {
                        return $query->where('nama', 'like', "%{$search}%")
                                     ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->paginate(10); // Pagination dengan 10 item per halaman

        $count = $data->count();

        return view('registrasi.index', compact('count', 'data', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::get();
        $buku = Buku::all(); // Mengambil semua data buku
        return view('registrasi.create', compact('agama', 'buku'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'nullable|string|unique:registrasi,email',
            'alamat' => 'nullable|string',
            'agama' => 'nullable|',
            'no_hp' => 'nullable|numeric',
            'tgl_lahir' => 'nullable|date',
            'buku' => 'nullable|exists:buku,id', // Validasi bahwa buku yang dipilih ada di tabel buku
        ]);


        $registrasi = new Registrasi();
        $registrasi->nama = $request->nama;
        $registrasi->email = $request->email;
        $registrasi->alamat = $request->alamat;
        $registrasi->no_hp = $request->no_hp;
        $registrasi->agama = $request->agama;
        $registrasi->tgl_lahir = $request->tgl_lahir;
        $registrasi->buku_id = $request->buku;
        $registrasi->save();
        $id_registrasi = $registrasi->id;

        $buku = Buku::find($validated['buku']);
        if ($buku && $buku->stok > 0) {
            $buku->stok -= 1;
            $buku->save();
        } else {
            // Tampilkan error jika stok buku tidak cukup
            return back()->withErrors(['buku' => 'Stok buku tidak cukup']);
        }

        return redirect()->route('registrasi.index')->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id); // Pastikan data ditemukan
        $agama = Agama::all();
        return view('registrasi.edit', compact('registrasi', 'agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|unique:registrasi,email,' . $id,
            'alamat' => 'nullable|string|max:500',
            'agama' => 'nullable|exists:agama,id',
            'no_hp' => 'nullable|numeric|digits_between:10,13',
            'tgl_lahir' => 'nullable|date',
            'buku' => 'nullable|exists:buku,id',
        ]);

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update($validated);



        return redirect()->route('registrasi.index')
                         ->with('pesan', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('registrasi.index')
                         ->with('pesan', 'Data berhasil dihapus');
    }

    public function cetak($id)
    {
        $registrasi = Registrasi::find($id);
        $pdf = Pdf::loadView('registrasi.cetak', ['registrasi'=> $registrasi]);
        return $pdf->download('KartuRegistrasi.pdf');
    }
}
