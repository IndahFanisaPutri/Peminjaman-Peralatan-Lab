<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ServisAlat extends Model
{

    protected $fillable = [

        'alat_id',
        'tanggal_servis',
        'teknisi',
        'kerusakan',
        'tindakan',
        'status'

    ];



    public function alat()
    {

        return $this->belongsTo(
            AlatLaboratorium::class,
            'alat_id'
        );

    }

}