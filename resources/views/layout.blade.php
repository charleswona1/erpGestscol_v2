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
            {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0/dist/css/bootstrap.min.css"> --}}
            <link href="{{ asset('plugins/footable/css/footable.bootstrap.css') }}" rel="stylesheet">
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
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
            <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
            <script type="text/javascript" src="{{ asset('js/sb-admin-2.js') }}"></script>
            <script type="text/javascript" src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/recherche.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/tooltip.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/scrool.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/dropdown-menu.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>  
            <script type="text/javascript" src="{{ asset('plugins/footable/js/footable.js') }}"></script>
        @endif

        @stack('javascripts') 
        <script>
            jQuery(function($){
                $('#list').footable({
                    "paging": {
                        "enabled": true,
                        "size": 10,
                        "countFormat": "page : {CP} / {TP}",
                        "position": "right",
                        "limit": 5,
                    },
                    "filtering": {
                        "enabled": true,
                        "position": "left"
                    },
                    "sorting": {
                        "enabled": true
                    }

                });
            });           
        </script>
    </body>
</html>


 