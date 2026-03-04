<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Surat Masuk')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('asset/css/dashboard.css') }}?v={{ time() }}">
</head>
<body>

<div class="sidebar">
    <h4>📁 Surat App</h4>

    {{-- Dashboard --}}
    <a href="{{ auth()->user()->role === 'admin' 
        ? route('admin.dashboard') 
        : route('operator.dashboard') }}"
        class="nav-link 
        {{ request()->routeIs('admin.dashboard') || request()->routeIs('operator.dashboard') ? 'active-menu' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>

    {{-- Surat Masuk (Admin & Operator Bisa Akses) --}}
    <a href="{{ route('surat-masuk.index') }}"
        class="nav-link d-flex justify-content-between align-items-center 
        {{ request()->routeIs('surat-masuk.*') ? 'active-menu' : '' }}">

        <span>
            <i class="fa-solid fa-envelope-open-text"></i> Surat Masuk
        </span>
    </a>

    {{-- Menu Khusus Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('users.index') }}"
            class="nav-link 
            {{ request()->routeIs('users.*') ? 'active-menu' : '' }}">
            <i class="fa-solid fa-users"></i> Manajemen User
        </a>
        @endif
    
     <a href="{{ route('profile.edit') }}">
        <i class="fa fa-user"></i> Profile
    </a>

    <form method="POST" action="{{ route('logout') }}" class="mt-3 px-3">
        @csrf
        <button class="btn btn-danger w-10">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</div>

<div class="content">

    <div class="navbar-custom d-flex justify-content-between align-items-center px-3">

    <h5 class="mb-0">
        @yield('page-title', 'Dashboard')
    </h5>

    <div class="dropdown">
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle"
           href="#"
           role="button"
           data-bs-toggle="dropdown"
           aria-expanded="false">

            <div class="position-relative d-inline-block">
                <img src="{{ auth()->user()->photo 
                        ? asset('storage/profile/' . auth()->user()->photo) 
                        : asset('asset/img/default.png') }}" 
                    width="45" 
                    height="45"
                    class="rounded-circle"
                    style="object-fit:cover;">

                <span class="online-indicator"></span>
            </div>

            <div class="text-start">
                <div style="font-weight: 600;">
                    {{ auth()->user()->name }}
                </div>
                <small class="text-muted">
                    {{ ucfirst(auth()->user()->role) }}
                </small>
            </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow">
            <li class="dropdown-header">
                Login sebagai {{ ucfirst(auth()->user()->role) }}
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fa-solid fa-id-card me-2"></i> Profile
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('profile.password.form') }}">
                    <i class="fa-solid fa-key me-2"></i> Ganti Password
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item text-danger">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

</div>
    
    @yield('content')

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
