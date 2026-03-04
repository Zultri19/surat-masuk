<!DOCTYPE html>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}?v={{ time() }}">
</head>
<body>
    <div class="login-container">
    <img src="{{ asset('asset/images/ChatGPT_Image_9_Feb_2026__12.53.28-removebg-preview.png') }}" alt="Logo Kominfo">

    <h2>Registrasi Akun</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn-login">Register</button>

        <small class="register-text">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </small>
    </form>
    </div>
</body>
</html>
