<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'tb_ruang';
    protected $primaryKey = 'kode_ruang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kode_ruang', 'nama_ruang', 'no_gedung', 'kapasitas', 'fasilitas'];
}