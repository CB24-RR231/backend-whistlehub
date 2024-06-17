<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'laporan_id',
        'kepada',
        'judul',
        'isi',
        'lokasi',
        'telp',
        'lampiran',
        'bukti_selesai',
        'review',
        'status'
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
