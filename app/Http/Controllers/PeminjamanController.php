<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {

        $jumlahBukuDipinjam = 0;
        if (auth()->check()) {
            // Mengambil jumlah peminjaman yang terkait dengan user yang login
            $jumlahBukuDipinjam = auth()->user()->peminjaman->count();
        }
        // Ambil semua peminjaman yang dilakukan oleh user yang sedang login
        $peminjaman = Peminjaman::with('buku') // Mengambil relasi buku
                                ->where('user_id', Auth::id()) // Mengambil peminjaman berdasarkan user yang login
                                ->get();

        return view('peminjaman.index', compact('peminjaman', 'jumlahBukuDipinjam'));
    }

    public function destroy($id)
{
    // Cari data peminjaman berdasarkan ID
    $peminjaman =Peminjaman::findOrFail($id);

    // Hapus data peminjaman dari database
    $peminjaman->delete();

    // Redirect kembali ke halaman daftar peminjaman dengan pesan sukses
    return redirect()->route('registrasi.index')->with('pesan', 'Data peminjaman berhasil dihapus.');
}
}
