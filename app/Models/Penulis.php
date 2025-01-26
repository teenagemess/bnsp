<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama'];

    // Relasi: Penulis memiliki banyak buku
    public function buku()
    {
        return $this->hasMany(Buku::class, 'penulis_id');
    }
}
