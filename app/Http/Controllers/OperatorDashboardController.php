<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;

// use Illuminate\Http\Request;

class OperatorDashboardController extends Controller
{
    public function index()
    {
        $totalSurat = SuratMasuk::count();

        return view('dashboard.operator', compact('totalSurat'));
    }
}
