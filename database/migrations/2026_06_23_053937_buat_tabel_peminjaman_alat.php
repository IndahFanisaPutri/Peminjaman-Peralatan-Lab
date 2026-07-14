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
        Schema::create('peminjaman_alat', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');


            $table->foreignId('alat_id')
                ->constrained('alat_laboratorium')
                ->onDelete('cascade');

            $table->string('nama_peminjam');
            $table->string('nim_peminjam');
            $table->string('fakultas')->nullable();

            $table->integer('jumlah_pinjam')->default(1);
            $table->text('keperluan');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_rencana_kembali');

            $table->date('tanggal_kembali')->nullable();

            $table->enum('kondisi_kembali', ['baik', 'cukup', 'rusak'])->nullable();


            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak',
                'menunggu_pengembalian',
                'dikembalikan'
            ])->default('menunggu');

            $table->string('disetujui_oleh')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_alat');
    }
};
