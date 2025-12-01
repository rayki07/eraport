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
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ujian');// contoh :  Tahfidz, Praktik Sholat, Wudhu
            $table->string('kategori')->nullable(); // kategori opsional contoh : Tahfidz, Akhlak, Ibadah
            $table->foreignId('semester_id')->nullable()->constrained('semester')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian');
    }
};
