<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Gestion Scolaire | @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('assets1/images/favicon.png') }}" />
        
       
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
            <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            {{-- <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
            <script type="text/javascript" src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
            <script type="text/javascript" src="{{ asset('js/sb-admin-2.js') }}"></script>
            <script type="text/javascript" src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/recherche.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/tooltip.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/scrool.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/dropdown-menu.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>  
        @endif

        @stack('javascripts')
    </body>
</html>


 