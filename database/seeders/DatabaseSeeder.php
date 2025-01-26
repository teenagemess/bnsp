<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('agama')->insert([
            ['nama_agama' => 'Islam', 'created_at' => now(), 'updated_at' => now()],
            ['nama_agama' => 'Kristen', 'created_at' => now(), 'updated_at' => now()],
            ['nama_agama' => 'Buddha', 'created_at' => now(), 'updated_at' => now()],
            ['nama_agama' => 'Konghucu', 'created_at' => now(), 'updated_at' => now()],
            ['nama_agama' => 'Hindu', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->call([
            PenulisSeeder::class,  // Menambahkan seeder Penulis
            BukuSeeder::class,     // Menambahkan seeder Buku
            AdminSeeder::class,     // Menambahkan seeder Buku
        ]);


        DB::table('agama');
        // Buku::factory(100)->create();
        // User::factory(1)->create();

    }

}
