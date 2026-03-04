@extends('layouts.admin')

@section('content')

<div class="card shadow">
    <div class="card-header">
        Edit Surat Masuk
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
              action="{{ route('surat-masuk.update', $suratMasuk->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control" required>

                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ $suratMasuk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nomor Berkas</label>
                <input type="text" name="nomor_berkas"
                       value="{{ $suratMasuk->nomor_berkas }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Alamat Pengirim</label>
                <input type="text" name="alamat_pengirim"
                       value="{{ $suratMasuk->alamat_pengirim }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggal_surat"
                       value="{{ $suratMasuk->tanggal_surat->format('Y-m-d') }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nomor Surat</label>
                <input type="text" name="nomor_surat"
                       value="{{ $suratMasuk->nomor_surat }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Perihal</label>
                <input type="text" name="perihal"
                       value="{{ $suratMasuk->perihal }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>File Surat</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

<div class="mb-3">
    <label>File Surat</label>

    <input type="file" name="file" class="form-control">

    @if($suratMasuk->file)
        <div class="mt-3">

            <p><strong>File Saat Ini:</strong></p>

            <div class="mb-2">
                <a href="{{ asset('storage/surat/'.$suratMasuk->file) }}"
                   target="_blank"
                   class="btn btn-primary btn-sm">
                    🔍 Preview Fullscreen
                </a>

                <a href="{{ asset('storage/surat/'.$suratMasuk->file) }}"
                   download
                   class="btn btn-success btn-sm">
                    ⬇ Download File
                </a>
            </div>

            @php
                $ext = strtolower(pathinfo($suratMasuk->file, PATHINFO_EXTENSION));
            @endphp

            @if(in_array($ext, ['jpg','jpeg','png']))
                <img src="{{ asset('storage/surat/'.$suratMasuk->file) }}"
                     alt="Preview"
                     style="max-width:300px; border-radius:8px; border:1px solid #ccc;">

            @elseif($ext == 'pdf')
                <iframe src="{{ asset('storage/surat/'.$suratMasuk->file) }}"
                        width="100%"
                        height="400px"
                        style="border:1px solid #ccc; border-radius:8px;">
                </iframe>
            @endif

        </div>
    @endif
</div>

@endsection
