<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy('created_at')->paginate(4);
            // Mengambil jumlah buku yang dipinjam oleh pengguna yang sedang login
        $jumlahBukuDipinjam = 0;
        if (auth()->check()) {
            // Mengambil jumlah peminjaman yang terkait dengan user yang login
            $jumlahBukuDipinjam = auth()->user()->peminjaman->count();
        }



        return view('welcome', compact('buku', 'jumlahBukuDipinjam'));
    }
        public function bukufrontend()
        {
            $buku = Buku::get();
                // Mengambil jumlah buku yang dipinjam oleh pengguna yang sedang login
            $jumlahBukuDipinjam = 0;
            if (auth()->check()) {
                // Mengambil jumlah peminjaman yang terkait dengan user yang login
                $jumlahBukuDipinjam = auth()->user()->peminjaman->count();
            }



            return view('buku-frontend', compact('buku', 'jumlahBukuDipinjam'));
        }

    public function pinjamBuku($id)
    {
        // Ambil data buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Pastikan stok buku tersedia
        if ($buku->stok > 0) {
            // Simpan data peminjaman
            Peminjaman::create([
                'user_id' => Auth::id(), // Menyimpan ID pengguna yang sedang login
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now(),
            ]);

            // Kurangi stok buku
            $buku->decrement('stok');

            return redirect()->route('buku-frontend')->with('success', 'Buku berhasil dipinjam.');
        } else {
            return redirect()->route('buku-frontend')->with('error', 'Stok buku tidak tersedia.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
