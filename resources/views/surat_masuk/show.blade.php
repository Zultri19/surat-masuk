@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header">
        Preview Surat
    </div>

    <div class="card-body">

        <table class="table">
            <tr>
                <th>Kategori</th>
                <td>{{ $suratMasuk->kategori->nama ?? '-' }}</td>
            </tr>
             
            <tr>
                <th>Nomor Berkas</th>
                <td>{{ $suratMasuk->nomor_berkas }}</td>
            </tr>

            <tr>
                <th>Alamat Pengirim</th>
                <td>{{ $suratMasuk->alamat_pengirim }}</td>
            </tr>

            <tr>
                <th>Tanggal Surat</th>
                <td>{{ $suratMasuk->tanggal_surat->format('d-m-Y') }}</td>
            </tr>

            <tr>
                <th>Nomor Surat</th>
                <td>{{ $suratMasuk->nomor_surat }}</td>
            </tr>
            
            <tr>
                <th>Perihal</th>
                <td>{{ $suratMasuk->perihal }}</td>
            </tr>
        </table>

        @if($suratMasuk->file)

            <iframe 
                src="{{ asset('storage/surat/' . $suratMasuk->file) }}"
                width="100%" 
                height="200px">
            </iframe>
        @endif

        <a href="{{ route('surat-masuk.index') }}"
           class="btn btn-secondary mt-3">
            Kembali
        </a>

    </div>

</div>

@endsection
