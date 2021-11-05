<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Scolaire</title>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
       
        @if (Request::is('gestscol/auth/login'))
            <link rel="stylesheet" href="/assets1/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="/assets1/vendors/css/vendor.bundle.base.css">
            <!-- endinject -->
            <!-- Plugin css for this page -->
            <!-- End plugin css for this page -->
            <!-- Layout styles -->
            <link rel="stylesheet" href="/assets1/css/demo/style.css">
            <link rel="stylesheet" href="/css/bootstrap.css">
            
        @else
            <link href="{{ asset('css/css2/main.css') }}" rel="stylesheet">
        @endif
        
        @stack('stylesheets')
    </head>
    <body class="antialiased">
        @yield('body')


        @if (Request::is('gestscol/auth/login'))
            <script src="{{asset('/assets1/vendors/js/vendor.bundle.base.js')}}"></script>
            <script src="{{asset('/assets1/js/material.js')}}"></script>
            <script src="{{asset('/assets1/js/misc.js')}}"></script>
        @else
            <script type="text/javascript" src="{{ asset('assets2/scripts/main.js') }}"></script>   
            <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('js/sb-admin-2.js') }}"></script>
            <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('js/dropdown-menu.js') }}"></script>
            <script src="{{ asset('js/scrool.js') }}"></script>
            <script src="{{ asset('js/tooltip.js') }}"></script>
            <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>    
        @endif

        @stack('javascripts')
    </body>
</html>