<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ServisAlat extends Model
{


    protected $table = 'servis_alat';



    protected $fillable = [

        'alat_id',

        'tanggal_servis',

        'tanggal_selesai',

        'status',

        'kerusakan',

        'tindakan',

        'foto'

    ];





    public function alat()
    {

        return $this->belongsTo(
            AlatLaboratorium::class,
            'alat_id'
        );
    }
}
