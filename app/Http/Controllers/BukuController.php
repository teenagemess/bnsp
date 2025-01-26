<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan semua data buku dengan relasi ke penulis
        $buku = Buku::with('penulis')->get();
        $buku = Buku::with('penulis')->paginate(10);
         // 10 adalah jumlah item per halaman

             // Mendapatkan query pencarian dari input pengguna
        $search = $request->input('search');

        // Mendapatkan data buku dengan relasi penulis, dan jika ada query pencarian, filter berdasarkan judul
        $buku = Buku::with('penulis')
                    ->when($search, function ($query, $search) {
                        return $query->where('judul', 'like', "%{$search}%");
                    })
                    ->paginate(10); // Pagination dengan 10 item per halaman

        return view('buku.index', compact('buku','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan semua data penulis untuk dropdown
        $penulis = Penulis::all();
        $buku = Buku::all();

        return view('buku.create', compact('penulis', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis_id' => 'required|exists:penulis,id',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|date',
            'stok' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = null;
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Menyimpan gambar ke folder 'uploads' di storage/public
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Menyimpan data buku dan path gambar (jika ada)
        Buku::create([
            'judul' => $validated['judul'],
            'penulis_id' => $validated['penulis_id'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'stok' => $validated['stok'],
            'image' => $imagePath,  // Menyimpan path gambar
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        // Menampilkan detail buku
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        // Mendapatkan semua data penulis untuk dropdown
        $penulis = Penulis::all();
        $buku = Buku::all(); // Mengambil semua data buku

        return view('buku.edit', compact('buku', 'penulis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis_id' => 'required|exists:penulis,id',
            'tahun_terbit'=>'nullable|numeric',
            'stok' => 'required|integer|min:0', // Validasi stok
        ]);

        // Mengupdate data buku
        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        // Menghapus data buku
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
