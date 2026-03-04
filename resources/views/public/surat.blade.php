<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Surat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="asset/css/jelajahsurat.css">
</head>

<body>

<!-- HERO -->
<div class="hero">
    <div class="container text-center">

        <h1><i class="fa-solid fa-envelope"></i> Jelajahi Surat</h1>
        <p class="mb-3">Sistem Informasi Arsip Surat Digital</p>

        <a href="/login" class="btn btn-light">
            <i class="fa-solid fa-right-to-bracket"></i> Login Admin
        </a>

    </div>
</div>


<div class="container">

    <!-- STATISTIK -->
    <div class="row mb-4 justify-content-center">

        <div class="col-md-4 col-lg-3 text-center">
            <div class="card stat-card shadow-sm text-center">
                <div class="card-body">
                    <i class="fa-solid fa-envelope fa-2x text-primary mb-2"></i>
                    <h6>Total Surat</h6>
                    <h3 class="text-primary">{{ $surat->total() }}</h3>
                </div>
            </div>
        </div>

    </div>


    <!-- SEARCH -->
    <div class="mb-4">
        <input type="text"
               id="searchInput"
               class="form-control search-box shadow-sm"
               placeholder="🔍 Cari nomor surat / perihal...">
    </div>


    <!-- LIST SURAT -->
    <div class="row" id="suratList">

        @foreach($surat as $s)

        @php
            $ext = strtolower(pathinfo($s->file, PATHINFO_EXTENSION));
        @endphp

        <div class="col-md-4 mb-4 surat-item">

            <div class="card position-relative">
                <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                    {{ $surat->firstItem() + $loop->index }}
                </span>

                <div class="card-body">

                    <h6 class="fw-bold text-primary">
                        {{ $s->nomor_surat }}
                    </h6>

                    <p class="text-muted mb-2">
                        {{ $s->perihal }}
                        <td title="{{ $s->perihal }}">
                        {{ Str::limit($s->perihal, 20) }}
                    </td>
                    </p>

                    <small class="text-secondary">
                        <i class="fa-solid fa-calendar"></i>
                        {{ $s->tanggal_surat }}
                    </small>

                    <hr>

                    <!-- FILE TYPE -->
                    @if($ext == 'pdf')
                        <span class="badge bg-danger badge-file">
                            <i class="fa-solid fa-file-pdf"></i> PDF
                        </span>
                    @elseif(in_array($ext, ['jpg','jpeg','png']))
                        <span class="badge bg-success badge-file">
                            <i class="fa-solid fa-file-image"></i> Gambar
                        </span>
                    @else
                        <span class="badge bg-secondary badge-file">
                            <i class="fa-solid fa-file"></i> File
                        </span>
                    @endif

                </div>

                <div class="card-footer bg-white border-0">

                    @if($s->file)
                        <a href="{{ asset('storage/surat/'.$s->file) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm w-100 btn-preview">
                            <i class="fa-solid fa-eye"></i> Preview Surat
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $surat->links() }}
</div>


<!-- SEARCH SCRIPT -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {

        let value = this.value.toLowerCase();
        let items = document.querySelectorAll('.surat-item');

        items.forEach(function(item) {
            let text = item.innerText.toLowerCase();

            item.style.display = text.includes(value) ? '' : 'none';
        });

    });
</script>

</body>
</html>