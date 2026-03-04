<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin TU</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}?v={{ time() }}">
</head>
<body>

<div class="login-container">

    <img src="{{ asset('asset/images/ChatGPT_Image_9_Feb_2026__12.53.28-removebg-preview.png') }}" alt="Logo Kominfo">

    <h2>Login Admin TU</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" placeholder="name@example.com" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn-login">Login</button>

        <small class="register-text">
            Belum punya akun? Hubungi administrator.
        </small>

    </form>
</div>
</body>
</html>
