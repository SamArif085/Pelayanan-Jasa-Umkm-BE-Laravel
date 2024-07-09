<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <title>Halaman Ragistrasi</title>
    <link href="{{asset('css/app.css')  }}" rel="stylesheet">
    @include('utils.head')
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <div>
                                <img style="width: 18rem" src="{{ asset('images/logo/logo.png') }}" class="img-fluid"
                                    alt="Responsive image" />
                            </div>
                            <h1 class="h2">Halaman Pendaftaran</h1>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="{{ route('registrasi-submit') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" name="nama" value="Pelanggan"
                                                class="form-control form-control-lg" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username:</label>
                                            <input type="text" id="username" name="username"
                                                class="form-control form-control-lg" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg" required />
                                            <!-- <small><a href="#">Forgot password?</a></small> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">No Telepon</label>
                                            <input type="text" id="username" name="notelp"
                                                class="form-control form-control-lg" required />
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" value="3" name="role"
                                                class="form-control form-control-lg" required />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                Registrasi
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

@include('utils.scripts')
<script src="{{ asset('js/app.js') }}"></script>
