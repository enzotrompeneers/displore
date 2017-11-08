<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
        @yield('head')
    </head>
    <body>
        @yield('modal')
        <header class="header">
            <div class="header-logo">
                <div class="header-logo-image">
                    <a href="{{ route('discover') }}"><img src="{{asset('assets/graphics/displore_logo.svg')}}" alt="Displore"></a>
                </div>

                <div class="header-logo-text show-for-medium-up">
                    <a href="{{ route('discover') }}">
                        Displore
                    </a>
                </div>
                
            </div>
            <nav>
                <ul class="show-for-medium-up">
                    <li class="header-list-item"><a href="{{ route('product.create') }}" class="red_ghost">Ervaring aanbieden</a></li>
                    <li class="header-list-item"><a href="{{ route('user.offers') }}" class="header-list-item-link">Jouw aanbiedingen</a></li>
                    @if ($user = Auth::user()) 
                        <span class="dropdown-holder">
                            <li class="header-list-item">
                                <a class="button primary dropdown">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>
                            </li>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-item"><a href="{{ route('user.profile') }}">Profiel</a></li>
                                <li class="dropdown-menu-item"><a href="{{ route('user.reservations') }}">Reservaties</a></li>
                                <li class="dropdown-menu-item"><a href="{{ route('logout') }}">Uitloggen</a></li>
                            </ul>
                        </span>
                    @else
                        <li class="header-list-item"><a class="button primary" href="{{ route('login') }}">Inloggen</a></li>
                    @endif
                    
                </ul>              
                <ul class="show-for-small-only">
                    <li class="header-list-item">
                        <div class="button primary" id="hamburger-button">
                           <img src="{{ asset('assets/graphics/hamburger.svg') }}" class="hamburger-button"/>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>

        <div id="hamburger-menu" class="hamburger-menu hidden">
            <ul>
                <li class="dropdown-menu-item red"><a href="{{ route('product.create') }}" >Ervaring aanbieden</a></li>
                <li class="dropdown-menu-item"><a href="{{ route('user.offers') }}">Jouw aanbiedingen</a></li>
                <li class="dropdown-menu-item"><a href="{{ route('user.profile') }}">Profiel</a></li>
                <li class="dropdown-menu-item"><a href="{{ route('user.reservations') }}">Reservaties</a></li>
                <li class="dropdown-menu-item"><a href="{{ route('logout') }}">Uitloggen</a></li>
            </ul>
        </div>
        
        <div class="container">
            @yield('content')
        </div>
   
        @include('includes.footer')
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>