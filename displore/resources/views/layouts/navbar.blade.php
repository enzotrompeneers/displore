<!-- Navbar -->
<nav class="top-bar" data-topbar>
    <ul class="title-area dropdown menu" data-dropdown-menu>
        <li class="header">
            <a href="{{ route('lander') }}"><img src="{{asset('assets/graphics/displore_logo.svg')}}" alt="Displore"></a>
        </li>
        <li><h1>Displore</h1></li>
    </ul>
    <ul class="left">
        <!-- <li><a href="{{ route('lander') }}">Home</a></li> -->
    </ul>
    <ul class="right">
        <li><a href="{{ route('lander') }}">Wat is displore?</a></li>
        @if ($user = Auth::user()) 
            <li><a href="{{ route('user.offers') }}">Jou aanbiedingen</a></li>
            <li><a href="{{ route('user.profile') }}">Toon Profiel</a></li>
            <li><a href="{{ route('logout') }}">Uitloggen</a></li>
        @else
            @include('layouts.login')
        @endif
    </ul>
</nav>
<!-- End Navbar -->