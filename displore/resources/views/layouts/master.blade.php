<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body class="body_master">
        <header>
            @include('layouts.navbar')
        </header>
        <container>
            @yield('content')
        </container>
        <footer>
            @include('includes.footer')
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>