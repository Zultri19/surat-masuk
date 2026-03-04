<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSurat = SuratMasuk::count();

        $suratHariIni = SuratMasuk::whereDate('created_at', Carbon::today())->count();

        $suratBulanIni = SuratMasuk::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // $suratTerbaru = SuratMasuk::latest()->take(5)->get();
        $suratTerbaru = SuratMasuk::latest()->paginate(3);
        return view('dashboard.index', compact(
            'totalSurat',
            'suratHariIni',
            'suratBulanIni',
            'suratTerbaru'
        ));
    }
}
