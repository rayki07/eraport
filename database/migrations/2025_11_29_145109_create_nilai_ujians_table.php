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
        Schema::create('nilai_ujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete(); // Relasi siswa
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete(); // Relasi kelas
            $table->foreignId('semester_id')->constrained('semester')->cascadeOnDelete(); // relasi semester
            $table->foreignId('ujian_id')->constrained('ujian')->cascadeOnDelete(); // Jenis ujian
            $table->foreignId('ujian_item_id')->constrained('ujian_item')->cascadeOnDelete(); // Item ujian (surah, doa, hadis)
            $table->integer('nilai')->nullable(); //nilai
            $table->text('catatan')->nullable(); //keterangan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ujians');
    }
};
