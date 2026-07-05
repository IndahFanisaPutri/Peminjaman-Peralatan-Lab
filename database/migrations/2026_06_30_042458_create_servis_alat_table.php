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
        Schema::create('servis_alat', function (Blueprint $table) {

        $table->id();


        $table->foreignId('alat_id')
        ->constrained('alat_laboratorium')
        ->onDelete('cascade');


        $table->date('tanggal_servis');


        $table->date('tanggal_selesai')
        ->nullable();


        $table->enum('status',[
            'menunggu',
            'proses',
            'selesai'
        ])
        ->default('menunggu');



        $table->text('kerusakan')
        ->nullable();



        $table->text('tindakan')
        ->nullable();



        $table->string('foto')
        ->nullable();



        $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis_alat');
    }
};
