<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body>
        <header>
            <form action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}
                <input type="submit" value="Uitloggen">
            </form>
        </header>
        <container>
            @yield('content')
        </container>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>