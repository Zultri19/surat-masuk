<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    protected $fillable = [
    'kategori_id',
    'nomor_berkas',
    'alamat_pengirim',
    'tanggal_surat',   
    'nomor_surat',
    'perihal',
    'file'
];

protected $casts = [
    'tanggal_surat' => 'date',
];

}


