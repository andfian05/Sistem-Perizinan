<!doctype html>
<html lang="en">
    <head>
        <title>{{ $title[0] }}</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icon.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/css/bootstrap.bundle.min.js') }}"></script>
</head>
<body style="background-color:#DFDfDF;">
    @if($title[0] != 'Aplikasi Perizinan Mahasantri')
    @if(auth()->user()->level == 'administrator')
    @include('page.administrator.part.navbarhandler')
        @endif
        @endif
    <div class="container mt-5">
        <div class="nv-op">
            @if($title[0] == 'Form Outing Mahasantri')
                @include('partials.profile')
            @else
                <div class="d-flex justify-content-center" onclick="window.location.href ='/welcome'">
                    <img src="{{ asset('assets/images/ybm.png') }}" class="w-75" alt="">
                </div>
            @endif
            @if($title[0] !== 'Sukses!' && $title[0] !== 'Gagal!' && $title[0] !== 'Keterangan')
                <h1 class="text-center" style="font-size:33px; font-weight:bold;">{{ $title[0] }}</h1>
            @endif

        </div>
        <div class="container mt-3">
            @yield('content')
        </div>
    </div>

    <script>
        $(document).on('click', '.nav-nv', function(e) {
            e.stopImmediatePropagation();
            $('.nv-op').css('opacity', '0.5');
        })
        $('.modal').on('hidden.bs.modal', function () {
            $('.nv-op').css('opacity', '1');
        });
    </script>
</body>

