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
        Schema::create('servis_alats', function (Blueprint $table) {

            $table->id();


            $table->foreignId('alat_id')
            ->constrained('lab_equipment')
            ->cascadeOnDelete();


            $table->date('tanggal_servis');


            $table->string('teknisi')
            ->nullable();


            $table->text('kerusakan');


            $table->text('tindakan')
            ->nullable();



            $table->enum(
                'status',
                [
                    'menunggu',
                    'proses',
                    'selesai'
                ]
            )
            ->default('menunggu');



            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis_alats');
    }
};
