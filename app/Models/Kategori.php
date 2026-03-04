<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function SuratMasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    protected $fillable = [
    'nama',
    'slug',
];

}


