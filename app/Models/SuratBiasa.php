<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratBiasa extends Model
{
    
    protected $table = 'surats_biasa';

    protected $fillable = [
        'tanggal_masuk', 
        'no_reg', 
        'bendel', 
        'pengirim', 
        'nomor_surat', 
        'perihal', 
        'kepada', 
        'tanggal_keluar', 
        'disposisi', 
        'tindak_lanjut', 
        'tanggal_penyelesaian'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
        'tanggal_penyelesaian' => 'date',
    ];
}
