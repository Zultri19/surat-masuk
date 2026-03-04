<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\User;

// use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalSurat = SuratMasuk::count();
        $totalUser = User::count();

        return view('dashboard.admin', compact('totalSurat','totalUser'));
    }
}
