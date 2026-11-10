<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'nama_pelapor',
        'judul',
        'deskripsi',
        'tipe_kerusakan',
        'wilayah',
        'latitude',
        'longitude',
        'foto',
        'status',
    ];
}