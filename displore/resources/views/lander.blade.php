<!DOCTYPE html>
<html>
    <head>
        <title>Displore</title>
		<meta charset="utf-8" />
		<meta name="description" content="Displore" />
		<meta name="keywords" content="Displore" />
		<meta name="robots" content="nofollow" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/normalize.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css">
		<link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

		<meta name="csrf-token" content="{{ csrf_token() }}">

	</head>
	<body class="lander-bg">

	<!-- Navbar -->
	<header class="header header-lander">
            <div class="header-logo">
                <div class="header-logo-image">
                    <a href="{{ route('lander') }}"><img src="{{asset('assets/graphics/displore_logo_dark.svg')}}" alt="Displore"></a>
                </div>

                <div class="header-logo-text">
                	{{-- TODO: GEEN INLINE STYLING --}}
                    <a href="{{ route('lander') }}" style="color:white;">
                        Displore
                    </a>
                </div>
                
            </div>
            <nav>
                <ul>
				 <li class="header-list-item"><a href="{{ route('lander') }}" class="header-list-item-link">Wat is displore?</a></li>

				@if ($user = Auth::user()) 
                    <li class="header-list-item"><a class="red_ghost" href="{{ route('user.offers') }}" >Jou aanbiedingen</a></li>
					<li class="header-list-item"><a class="header-list-item-link" href="{{ route('user.profile') }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
					<li class="header-list-item"><a class="button primary" href="{{ route('logout') }}">Uitloggen</a></li>
				@else
					<li class="header-list-item"><a class="button primary" href="{{ route('login') }}">Inloggen</a></li>
				@endif
                </ul>
                
                
            </nav>
        </header>
		<!-- End Navbar -->

        <!-- Call To Action -->
		<div class="call_to_action_wrapper">
			<h1>De website om ervaringen te ontdekken</h1>
			<h2>Weet je niet wat te doen? Heb je ooit al eens iets heel speciaal willen doen? Je vind het allemaal hier!</h2>
			<div class="form-group">
				<a href="{{ route('discover') }}" class="button red_btn">ONTDEKKEN</a>
				<a href="{{ route('product.create') }}" class="button white_btn">AANBIEDEN</a>
			</div>
		</div>
		<!-- End Call To Action -->
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>