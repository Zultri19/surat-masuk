@extends('layouts.admin')

@section('content')

<div class="card shadow">
    <div class="card-header">
        Tambah Surat Masuk
    </div>

    <div class="card-body">
        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('surat-masuk.store') }}"
              enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nomor Berkas</label>
                <input type="text" name="nomor_berkas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Alamat Pengirim</label>
                <input type="text" name="alamat_pengirim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Perihal</label>
                <input type="text" name="perihal" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label>File Surat</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
