<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AlatLaboratorium;

class PeminjamanAlat extends Model
{
    protected $table = 'peminjaman_alat';

    protected $fillable = [
        'user_id',
        'alat_id',
        'nama_peminjam',
        'nim_peminjam',
        'fakultas',
        'jumlah_pinjam',
        'keperluan',
        'tanggal_pinjam',
        'tanggal_rencana_kembali',
        'tanggal_kembali',
        'kondisi_kembali',
        'status',
        'disetujui_oleh'
    ];

    // Relasi: peminjaman milik 1 alat
    public function alat()
    {
        return $this->belongsTo(AlatLaboratorium::class, 'alat_id');
    }

    // Relasi: peminjaman milik 1 user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
