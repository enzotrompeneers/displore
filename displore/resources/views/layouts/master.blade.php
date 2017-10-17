<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body class="body_master">
        <header class="header">
            <div class="header-logo">
                <div class="header-logo-image">
                    <a href="{{ route('lander') }}"><img src="{{asset('assets/graphics/displore_logo.svg')}}" alt="Displore"></a>
                </div>

                <div class="header-logo-text">
                    <a href="{{ route('lander') }}">
                        Displore
                    </a>
                </div>
                
            </div>
            <nav>
                <ul>
                    

                    @if ($user = Auth::user()) 
                        <li class="header-list-item"><a href="{{ route('product.create') }}" class="red_ghost">Ervaring aanbieden</a></li>
                        <li class="header-list-item"><a href="{{ route('user.offers') }}" class="header-list-item-link">Jouw ervaringen</a></li>
                        <li class="header-list-item"><a class="button primary" href="{{ route('logout') }}">Uitloggen</a></li>
                    @else
                        <li class="header-list-item"><a class="button primary" href="{{ route('login') }}">Inloggen</a></li>
                    @endif
                    
                </ul>
                
                
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer>
            @include('includes.footer')
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>