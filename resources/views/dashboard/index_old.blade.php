@extends('layouts.admin')

@section('content')

<div class="row">

    <div class="col-md-4">
        <div class="card card-box bg-total shadow">
            <div class="card-body">
                <h6>Total Surat</h6>
                <h2>{{ $totalSurat }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-box bg-today shadow">
            <div class="card-body">
                <h6>Surat Hari Ini</h6>
                <h2>{{ $suratHariIni }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-box bg-month shadow">
            <div class="card-body">
                <h6>Surat Bulan Ini</h6>
                <h2>{{ $suratBulanIni }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 shadow">
    <div class="card-header">
        Surat Terbaru
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori ID</th>
                    <th>Nomor Berkas</th>
                    <th>Alamat Pengirim</th>
                    <th>Tanggal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>File</th>
                </tr>
            </thead>

            <tbody>
                @foreach($suratTerbaru as $s)
                <tr>
                    <td>{{ $loop->iteration + ($suratTerbaru->currentPage() - 1) * $suratTerbaru->perPage() }}</td>
                    <td>{{ $s->kategori_id }}</td>
                    <td>{{ $s->nomor_berkas }}</td>
                    <td>{{ $s->alamat_pengirim }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_surat)->format('d-m-Y') }}</td>
                    <td>{{ $s->nomor_surat }}</td>
                    <td title="{{ $s->perihal }}">
                        {{ Str::limit($s->perihal, 50) }}
                    </td>
                    <td title="{{ $s->perihal }}">
                        {{ Str::limit($s->perihal, 50) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $suratTerbaru->links() }}
    </div>
</div>

@endsection
