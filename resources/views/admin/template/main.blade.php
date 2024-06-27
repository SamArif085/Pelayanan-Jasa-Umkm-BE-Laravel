<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>{{ isset($title) ? $title : '' }}</title>
    <link href="{{asset('css/app.css')  }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <style>
        .custom-navbar {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar-toggle {
            margin-right: 0;
            padding-left: 5px;
        }

        .bi-list.icon-large {
            font-size: 1.5rem;
            color: #000;

        }

        .navbar-nav .nav-item .nav-link {
            padding: 0 10px;
        }

        .navbar-bg {
            background-color: #f8f9fa;

        }

        .sidebar {
            width: 250px;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
        }

        .small-image {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .img-container {
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fixed-size {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        @media (min-width: 992px) {
            #example_wrapper {
                overflow-x: auto;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .navbar-nav .dropdown-menu {
                right: 0;
                left: auto;
                min-width: 10rem;
                max-width: calc(100vw - 1rem);
                overflow-wrap: break-word;
                overflow-x: hidden;
                z-index: 1000;
            }

            .navbar-nav .dropdown-menu a.dropdown-item {
                white-space: normal;
            }
        }
    </style>

    @include('utils.head')
</head>

<body>
    <div class="wrapper">
        @include('admin.template.sidebar')
        <div class="main">
            @include('admin.template.nav')
            <div class="content">
                {!! isset($konten) ? $konten : '' !!}
            </div>
            @include('admin.template.footer')
        </div>
    </div>
</body>

</html>

@include('utils.scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    if (window.matchMedia("(min-width: 992px)").matches) {
    $('#example').DataTable();
    } else {
        $('#example').DataTable({
            scrollX: true,
        });
    }
    $('#basic-usage').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );
</script>
@yield('script')
