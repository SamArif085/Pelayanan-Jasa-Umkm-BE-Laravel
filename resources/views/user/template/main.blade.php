<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($title) ? $title : '' }}</title>
    <style>
        <style>.navbar {
            background-color: #343a40;
            padding: 1rem 2rem;
        }

        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
        }

        .navbar-toggler {
            background-color: #fff;
            border: none;
            color: #fff;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .navbar-toggler-icon {
            width: 1.5em;
            height: 1.5em;
            display: inline-block;
            background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath stroke="rgba(0, 0, 0, 0.5)" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"%3E%3C/path%3E%3C/svg%3E');
            background-repeat: no-repeat;
        }

        .collapse {
            display: none;
        }

        .collapse.show {
            display: block;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-link {
            color: #fff !important;
            font-size: 1.2rem;
            text-decoration: none;
            padding: 0.5rem 1rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #ccc !important;
        }

        .card {
            border: none;
            background: none;
        }

        .card-body {
            text-align: center;
        }

        .img-container {
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .fixed-size {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
    <link href="{{asset('css/app.css')  }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @include('utils.head')
</head>

<body>
    {!! isset($konten) ? $konten : '' !!}
    @include('user.template.footer')
</body>

</html>

@include('utils.scripts')
<script src="{{ asset('js/app.js') }}"></script>
