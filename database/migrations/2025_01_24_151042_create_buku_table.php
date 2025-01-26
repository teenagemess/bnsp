<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penulis_id')->constrained('penulis')->cascadeOnDelete();
            $table->string('judul', 255);
            $table->text('deskripsi')->nullable();
            $table->integer('stok')->default(0); // Kolom stok, default 0
            $table->string('penerbit')->nullable();
            $table->date('tahun_terbit')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
