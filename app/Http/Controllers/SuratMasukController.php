<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $surat = SuratMasuk::latest()->paginate(3);
        return view('surat_masuk.index', compact('surat'));
    }

    public function publicIndex()
    {
        // $surat = SuratMasuk::latest()->get();
        $surat = SuratMasuk::latest()->paginate(5);
        return view('public.surat', compact('surat'));
    }

    public function create()
    {
        // return view('surat_masuk.create');

        $kategori = Kategori::all();
        return view('surat_masuk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'nomor_berkas' => 'required',
            'alamat_pengirim' => 'required',
            'tanggal_surat' => 'required|date',
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFileAsli = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('surat', $namaFileAsli, 'public');
            $data['file'] = $namaFileAsli;
        }

        SuratMasuk::create($data);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        // return view('surat_masuk.edit', compact('suratMasuk'));

        $kategori = Kategori::all();
        return view('surat_masuk.edit', compact('suratMasuk', 'kategori'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'nomor_berkas' => 'required',
            'alamat_pengirim' => 'required',
            'tanggal_surat' => 'required|date',
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png'    
        ]);

        // 🔥 kalau ada file baru diupload
        if ($request->hasFile('file')) {
            // hapus file lama
            if ($suratMasuk->file && file_exists(public_path('storage/surat/'.$suratMasuk->file))) {
                unlink(public_path('storage/surat/'.$suratMasuk->file));
            }

            // nama file timestamp
            $file = $request->file('file');
            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->storeAs('surat', $namaFile, 'public');

            $data['file'] = $namaFile;
        }

        $suratMasuk->update($data);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $surat = SuratMasuk::findOrFail($suratMasuk);
        $suratMasuk->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        return view('surat_masuk.show', compact('suratMasuk'));
    }

    public function preview($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $path = storage_path('app/public/' . $surat->file);
        return response()->file($path);
    }
}
