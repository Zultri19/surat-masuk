<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Surat Masuk</title>
    <link rel="stylesheet" href="asset/css/landing.css">

</head>
<body>

    <!-- Navbar -->
    <header class="navbar">
        <img src="asset/images/ChatGPT_Image_9_Feb_2026__12.53.28-removebg-preview.png" alt="Logo Kominfo" class="logo">
    </header>



    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>Aplikasi Pencatatan Surat Masuk</h1>
            <p>
                Sistem digital untuk membantu Tata Usaha mencatat,
                menyimpan, dan mencari surat masuk dengan cepat,
                rapi, dan aman.
            </p>
            <a href="{{ route('surat.public') }}" class="btn-primary">Jelajahi Surat</a>
            <a href="{{ route('login') }}" class="btn-primary">Masuk ke Aplikasi</a>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info">
        <h2>Kenapa Menggunakan Aplikasi Ini?</h2>
        <div class="info-box">
            <div class="card">
                <h3>📥 Tercatat Rapi</h3>
                <p>Semua surat masuk tercatat secara digital dan terstruktur.</p>
            </div>
            <div class="card">
                <h3>🔍 Mudah Dicari</h3>
                <p>Pencarian surat cepat berdasarkan nomor, tanggal, atau pengirim.</p>
            </div>
            <div class="card">
                <h3>🗂️ Arsip Aman</h3>
                <p>File surat tersimpan rapi dan tidak mudah hilang.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2026 Aplikasi Surat Masuk | Tata Usaha</p>
    </footer>

</body>
</html>
