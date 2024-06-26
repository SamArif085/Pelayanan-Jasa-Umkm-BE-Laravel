<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Faiz Teknik Blitar</a>
        <button class="navbar-toggler btn-primary" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#layanan">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#lokasi">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a href='{{ route('web-login') }}' class="nav-link text-white">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="display-4">FAIZ TEKNIK</h1>
            <p class="lead">
                "Di Faiz Teknik, kami tidak hanya memperbaiki perangkat elektronik rumah tangga Anda, kami merawatnya
                dengan
                penuh perhatian agar kembali berfungsi seperti baru. Layanan servis kami menghadirkan kehandalan dan
                kepercayaan untuk memastikan kelancaran aktivitas rumah tangga Anda."
            </p>
            <hr class="my-4" />
        </div>
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('images/logo/logo.png') }}" alt="Responsive image" />
        </div>
    </div>
    <div class="row mb-3" id="layanan">
        <div class="col-md-12 mb-3">
            <center>
                <h1 class="display-4">Layanan Jasa</h1>
            </center>
        </div>
        <div class="row mb-3">
            @foreach ($namaElektronik as $key => $item)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="img-container">
                        <img alt="Gambar" class="card-img-top fixed-size" src="{{ asset($item['gambar']) }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Servis {{ $item['layanan'] }}</h5>
                        <p class="card-text">{{ $item['deskripsi'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 mb-3">
            <center>
                <h1 class="display-4">Silahkan Hubungi Kami dengan Klik Dibawah Ini</h1>
                <br />
                <a class="btn btn-primary btn-lg" href="#" role="button">Hubungi Kami</a>
            </center>
        </div>
        <div class="col-md-12" id="lokasi">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1174.2988717588994!2d112.13515785641616!3d-8.11625823641366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMDYnNTcuNyJTIDExMsKwMDgnMDYuMSJF!5e0!3m2!1sid!2sid!4v1719240042916!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
