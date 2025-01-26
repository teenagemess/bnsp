<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penulis;

class PenulisSeeder extends Seeder
{
    public function run()
    {
        // Membuat data penulis jika belum ada
        Penulis::factory(5)->create();  // Misalnya, buat 5 data penulis
    }
}
