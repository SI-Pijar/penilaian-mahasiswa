<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignUuid('mata_kuliah_id')->constrained('mata_kuliah')->cascadeOnDelete();
            $table->decimal('kehadiran', 5, 2);
            $table->decimal('tugas', 5, 2);
            $table->decimal('uts', 5, 2);
            $table->decimal('uas', 5, 2);
            $table->decimal('nilai_akhir', 5, 2);
            $table->string('huruf', 2);
            $table->decimal('bobot', 3, 2);
            $table->timestamps();
            $table->unique(['mahasiswa_id', 'mata_kuliah_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};