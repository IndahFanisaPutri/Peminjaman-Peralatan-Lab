<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('alat_laboratorium', 'foto')) {

            Schema::table('alat_laboratorium', function (Blueprint $table) {

                $table->string('foto')->nullable()->after('deskripsi');

            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('alat_laboratorium', 'foto')) {

            Schema::table('alat_laboratorium', function (Blueprint $table) {

                $table->dropColumn('foto');

            });

        }
    }
};