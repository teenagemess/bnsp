<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'registrasi';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'no_hp',
        'tgl_lahir',
        'alamat',
        'agama',
    ];

    public function buku()
{
    return $this->belongsTo(Buku::class, 'buku_id'); // Pastikan kolom buku_id ada di tabel registrasi
}

}
