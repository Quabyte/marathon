<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>38. Vodafone Istanbul Marathon</title>
        
        <!--- STYLES -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extend.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        
        <!-- PLUGINS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animsition.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/asScrollable.min.css') }}">
        @yield('customCss')
        
        <!-- FONTS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

        <!-- SCRIPTS -->
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/breakpoints.min.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body>
        @include('components.header')

        <div class="marathonHeader"></div>

        <section class="innerContent">
            <div class="container">
                <h2 class="pageTitle">@yield('title')</h2>
                <div class="row margin-bottom-30">
                    @yield('content')
                </div>
            </div>            
        </section>

        <footer>
            @include('components.footer')
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/core.min.js') }}"></script>
        <script src="{{ asset('js/site.min.js') }}"></script>
        <script>
            (function(document, window, $) {
                'use strict';
                var Site = window.Site;
                $(document).ready(function() {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>
        @yield('scripts')
    </body>
</html>
