<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE peminjaman_alat
            MODIFY status ENUM(
                'menunggu',
                'disetujui',
                'dipinjam',
                'menunggu_pengembalian',
                'dikembalikan',
                'terlambat',
                'ditolak'
            ) DEFAULT 'menunggu'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE peminjaman_alat
            MODIFY status ENUM(
                'menunggu',
                'disetujui',
                'dipinjam',
                'dikembalikan',
                'terlambat',
                'ditolak'
            ) DEFAULT 'menunggu'
        ");
    }
};
