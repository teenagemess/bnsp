<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('registrasi', function (Blueprint $table) {
            $table->foreignId('buku_id')->nullable()->constrained('buku')->onDelete('set null'); // Menambahkan buku_id sebagai foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrasi', function (Blueprint $table) {
            $table->foreignId('buku_id')->nullable()->constrained('buku')->onDelete('set null');
        });
    }
};
