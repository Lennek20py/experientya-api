<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Bootstrap core CSS -->
        {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
        <!-- Material Design Bootstrap -->
        {{-- <link href="/css/mdb.min.css" rel="stylesheet"> --}}
        <!-- Your custom styles (optional) -->
        {{-- <link href="/css/style.css" rel="stylesheet"> --}}

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    {{-- <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script> --}}
    <!-- Bootstrap tooltips -->
    {{-- <script type="text/javascript" src="/js/popper.min.js"></script> --}}
    <!-- Bootstrap core JavaScript -->
    {{-- <script type="text/javascript" src="/js/bootstrap.min.js"></script> --}}
    <!-- MDB core JavaScript -->
    {{-- <script type="text/javascript" src="/js/mdb.min.js"></script> --}}

    {{-- <script type="text/javascript">
    $(function() {
        $('.carousel').carousel({
            touch: true // default
        });
    });
    </script> --}}
</html>
