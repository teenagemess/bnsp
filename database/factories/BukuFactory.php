<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * Nama model yang terkait.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Definisikan model data yang akan dihasilkan.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'penulis_id' => Penulis::inRandomOrder()->first()->id, // Mengambil penulis secara acak
            'judul' => $this->faker->sentence(3), // Judul buku (3 kata)
            'deskripsi' => $this->faker->paragraph(), // Deskripsi buku
        ];
    }
}
