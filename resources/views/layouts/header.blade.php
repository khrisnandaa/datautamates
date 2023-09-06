<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    {{-- <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet"/> --}}
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />

    <style>
        .btn-group-xs>.btn,
        .btn-xs {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgb(17 26 104 / 10%);
        }

        .stamp {
            height: 80px;
            position: absolute;
            top: 200px;
            left: 100px;
            transform: rotate(-20deg)
        }


        /* .print {
            display: none;
        }

        @media print {
            .non-print {
                display: none;
            }

            .print {
                background-image: url('{{ asset('/storage/data_master/Thumb/bg.png') }}');
                background-repeat: no-repeat;
                background-size: 60% 40%;
                background-position-y: 60%;
                background-position-x: 95%;
                display: block;
                -webkit-print-color-adjust: exact;
            }
        } */

        .card-header {
            border-radius: 15px 15px 0px 0px !important;
        }

        .form-control {
            border-radius: 15px;
        }

        .btn {
            border-radius: 15px;
        }

        button.buttons-html5 {
            padding: .25rem .4rem !important;
            font-size: .875rem !important;
            line-height: .5 !important;
        }
    </style>

</head>

<body>
    {{-- <div id="app"> --}}
    <nav
        class="navbar navbar-expand-lg navbar-dark bg-green text-white shadow-sm sticky-top d-md-none d-lg-none d-xl-none">
        <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart mr-1"></i><b>
            </b></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link putih" href="{{ route('product.index') }}"><i
                            class="fa fa-shopping-bag mr-2"></i>Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link putih" href="{{ route('transaction.index') }}"><i
                            class="fa fa-file-invoice mr-2"></i>Transaksi</a>
                </li>
                {{-- <li class="nav-item">
                                  <a class="nav-link putih" href="{{route('pengaturan')}}"><i class="fa fa-cog mr-2"></i>Pengaturan</a>
                              </li> --}}
                <li class="nav-item">
                    <a class="nav-link putih" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                            class="fa fa-power-off mr-2"></i>Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="bg-green text-center py-2 shadow-sm sticky-top d-none d-md-block">
        <a class="navbar-brand text-white" href="#"><i class="fa fa-shopping-cart mr-1"></i><b>
            </b></a>
    </div>
    <br>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3 mb-2 d-none d-md-block">
                <div class="card">
                    <div class="card-header bg-green">
                        <div class="card-tittle text-white">Hallo, <b>{{ Auth::user()->name }}</b></div>
                    </div>
                    <div class="card-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.index') }}"><i
                                        class="fa fa-shopping-bag text-green mr-2"></i>Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaction.index') }}"><i
                                        class="fa fa-file-invoice text-green mr-2"></i>Transaksi</a>
                            </li>
                            {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('pengaturan')}}"><i class="fa fa-cog text-green mr-2"></i>Pengaturan</a>
                                </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                        class="fa fa-power-off text-green mr-2"></i>Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- <main class="py-4"> --}}
            @yield('content')
            {{-- </main> --}}
            {{-- </div> --}}
</body>
<script>
$(document).ready(function() {

    $('#table_barang').DataTable({
        "scrollX": true
    });
});
</script>
</html>
