<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * @var string
     */
    protected $table = 'buku';

    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'penulis_id',
        'judul',
        'deskripsi',
        'stok',
        'penerbit',
        'tahun_terbit',
        'image'
    ];

    /**
     * Relasi ke model Penulis.
     * Buku dimiliki oleh satu penulis.
     *
     *
     */
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }
    public function registrasis()
    {
        return $this->hasMany(Registrasi::class);
    }
}
