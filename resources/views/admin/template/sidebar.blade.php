<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a href="{{ route('dashboard') }}" class="sidebar-brand d-flex align-items-center text-decoration-none">
            <img class="img-fluid small-image" src="{{ asset('images/logo/logo.png') }}" alt="Responsive image" />
            <span class="align-middle ">Faiz Teknik Blitar</span>
        </a>
        <ul class="sidebar-nav">
            @if($user->role == 1)
            <li class="sidebar-header">Pages Admin</li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard Admin</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('pesanan-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Pesanan Admin</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('layanan-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Layanan Admin</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('master-user-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Tambah User</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('riwayat-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Riwayat Pelanggan</span>
                </a>
            </li>
            @endif

            @if($user->role == 2)
            <li class="sidebar-header">Pages Teknisi</li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard Teknisi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('pesanan-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Pesanan Teknisi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('riwayat-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Riwayat Teknisi</span>
                </a>
            </li>
            @endif

            @if($user->role == 3)
            <li class="sidebar-header">Pages Pelanggan</li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard Pelanggan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('pesanan-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Pesanan Pelanggan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('layanan-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Layanan Pelanggan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('riwayat-web') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Riwayat Pelanggan</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
