<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
// use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();
        return view('surat_masuk.create', compact('kategori'));
    }

}
