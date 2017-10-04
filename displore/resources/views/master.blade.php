<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body>
        <container>
            @yield('content')
        </container>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>