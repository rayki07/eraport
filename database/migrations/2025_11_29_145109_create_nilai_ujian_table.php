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
        Schema::create('nilai_ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('guru')->restrictOnDelete(); // Relasi Guru
            $table->foreignId('siswa_id')->constrained('siswa')->restrictOnDelete(); // Relasi siswa
            $table->foreignId('kelas_id')->constrained('kelas')->restrictOnDelete(); // Relasi kelas
            $table->foreignId('semester_id')->constrained('semester')->restrictOnDelete(); // relasi semester
            $table->foreignId('ujian_item_id')->constrained('ujian_item')->restrictOnDelete(); // Item ujian (surah, doa, hadis)
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
        Schema::dropIfExists('nilai_ujian');
    }
};
