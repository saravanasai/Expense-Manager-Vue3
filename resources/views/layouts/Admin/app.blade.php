<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('tab_tittle')</title>
    @yield('meta_tages')
    <!-- CSS files -->
    <link href="{{ asset('adminTheme/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTheme/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/sb-1.3.2/sl-1.3.4/datatables.min.css" />

</head>

<body class="theme-light" >
    <div class="page" id="app">

    </div>
    <div  id="model">

    </div>

    <!-- Libs JS -->
    <script src={{ mix('js/app.js') }} defer></script>
    <script src="{{ asset('adminTheme/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('adminTheme/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src={{ asset('adminTheme/dist/libs/jsvectormap/dist/maps/world.js') }} defer></script>
    <script src={{ asset('adminTheme/dist/libs/jsvectormap/dist/maps/world-merc.js') }} defer></script>
    <!-- Tabler Core -->
    <script src={{ asset('adminTheme/dist/js/tabler.js') }} defer></script>
    <script src={{ asset('adminTheme/dist/js/demo.js') }} defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    @yield('scripts')
</body>

</html>
