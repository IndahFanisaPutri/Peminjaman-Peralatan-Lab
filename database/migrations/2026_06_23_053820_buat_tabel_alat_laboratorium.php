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
        Schema::create('alat_laboratorium', function (Blueprint $table) {
            $table->id();

            $table->string('kode_alat', 30)->unique();
            $table->string('nama_alat', 200);
            $table->string('kategori')->nullable();
            $table->string('merk')->nullable();
            $table->string('model')->nullable();

            $table->enum('kondisi', ['baik', 'cukup', 'perlu_perbaikan', 'rusak'])
                ->default('baik');

            $table->integer('jumlah')->default(1);
            $table->integer('jumlah_tersedia')->default(1);

            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_laboratorium');
    }
};
