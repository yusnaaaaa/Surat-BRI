<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratRahasia extends Model
{

    protected $table = 'surats_rahasia';

    protected $fillable = [
        'tanggal_masuk',
        'tanggal_surat',
        'bendel',
        'dari',
        'nomor_surat',
        'perihal',
        'masuk_ke',
        'tanggal_keluar',
        'disposisi'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_surat' => 'date',
        'tanggal_keluar' => 'date',
    ];
}
