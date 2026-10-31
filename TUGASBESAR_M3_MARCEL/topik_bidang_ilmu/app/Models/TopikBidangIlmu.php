<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopikBidangIlmu extends Model
{
    protected $table = 'topik_bidang_ilmu';

    public $timestamps = false;

    protected $fillable = [
        'Rumpun_Ilmu',
        'Pengelolaan_Taksonomi_Topik_Riset',
        'Deskripsi_Fokus',
        'Kata_Kunci_Penelitian',
    ];
}