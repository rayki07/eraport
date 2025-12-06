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
            $table->foreignId('siswa_id')->constrained('siswa')->restrictOnDelete(); // Relasi siswa
            $table->foreignId('kelas_id')->constrained('kelas')->restrictOnDelete(); // Relasi kelas
            $table->foreignId('ujian_id')->constrained('ujian')->restrictOnDelete(); // Item ujian (surah, doa, hadis)
            $table->foreignId('ujian_item_id')->constrained('ujian_item')->restrictOnDelete(); // Item ujian (surah, doa, hadis)
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajaran')->restrictOnDelete(); // relasi tahun ajaran
            $table->foreignId('semester_id')->constrained('semester')->restrictOnDelete(); // relasi semester
            $table->integer('nilai')->nullable(); //nilai
            $table->text('catatan')->nullable(); //keterangan

            // Supaya tidak dobel nilai siswa untuk ujian yang sama
            $table->unique(['siswa_id','ujian_item_id', 'semester_id'], 'unique_nilai_ujian');
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
