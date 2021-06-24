<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('headings')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script type="text/javascript" > 
        var BASE_URL = "{{ url('/') }}";
        </script>
    </head>
    <body>
        <main>
        @yield('content')
        </main>
    </body>
</html>