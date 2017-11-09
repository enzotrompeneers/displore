<!DOCTYPE html>
<html>
<head>
    @include('includes.header')
</head>

<body class="lander-bg">
    @component('components.modal')
        @slot('id')
            displore-modal
        @endslot
        @slot('overlay_class')
            modal-hidden
        @endslot
        @slot('class')
            modal-video
        @endslot
    @endcomponent


	<!-- Navbar -->
	<header class="header header-lander">
            <div class="header-logo">
                <div class="header-logo-image">
                    <a href="{{ route('lander') }}"><img src="{{asset('assets/graphics/displore_logo_dark.svg')}}" alt="Displore"></a>
                </div>

                <div class="header-logo-text show-for-medium-up">
                    <a href="{{ route('lander') }}" style="color: white;">
                        Displore
                    </a>
                </div>
                
            </div>
            <nav>
                <ul class="show-for-medium-up">
                    @if ($user = Auth::user()) 
                        <li class="header-list-item"><a href="{{ route('product.create') }}" class="red_ghost">Ervaring aanbieden</a></li>
                        <li class="header-list-item"><a href="{{ route('user.offers') }}" class="header-list-item-link">Jouw aanbiedingen</a></li>
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
                        <li class="header-list-item"><a class="header-list-item-link" id="wat-is-displore">Wat is displore?</a></li>
                        <li class="header-list-item"><a class="button primary" href="{{ route('login') }}">Inloggen</a></li>
                    @endif
                    
                </ul>              
                
            </nav>
        </header>
		<!-- End Navbar -->

        <!-- Call To Action -->
		<div class="container container-calltoaction">
			<h1>De website om ervaringen te ontdekken</h1>
            <h2>Op zoek naar een unieke ervaring? Iets om mee te kunnen uitpakken tegen over vrienden en familie? Ontdek dan snel de ervaringen die onze gebruikers organiseren op ons platform.</h2>
			<div class="lander-button-group">
				<a href="{{ route('discover') }}" class="button red_btn">ERVARINGEN ONTDEKKEN</a>
				<a href="{{ route('product.create') }}" class="button white_btn">ZELF EEN ERVARING ORGANISEREN</a>
			</div>
		</div>
		<!-- End Call To Action -->
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>