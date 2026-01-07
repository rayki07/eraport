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
        Schema::create('nilai_hafalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->restrictOnDelete();
            $table->string('target')->nullable();
            $table->integer('pencapaian')->nullable();
            $table->string('nilai')->nullable();
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajaran')->restrictOnDelete();
            $table->foreignId('semester_id')->constrained('semester')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_hafalans');
    }
};
