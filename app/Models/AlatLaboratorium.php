<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatLaboratorium extends Model
{
    protected $table = 'alat_laboratorium';

    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'kategori',
        'merk',
        'model',
        'kondisi',
        'jumlah',
        'jumlah_tersedia',
        'lokasi',
        'deskripsi',
        'foto'
    ];

    // Relasi: 1 alat punya banyak peminjaman
    public function peminjaman()
    {
        return $this->hasMany(PeminjamanAlat::class, 'alat_id');
    }
}
