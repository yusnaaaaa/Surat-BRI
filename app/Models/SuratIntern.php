<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratIntern extends Model
{

    protected $table = 'surats_intern';

    protected $fillable = [
        'tanggal_masuk',
        'bagian',
        'dari',
        'bendel',
        'nomor_surat',
        'perihal',
        'masuk_ke',
        'tanggal_kembali'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_kembali' => 'date',
    ];
}
