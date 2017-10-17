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
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">

	</head>
	<body class="body_lander">
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
					<li><a href="{{ route('user.offers') }}">Jouw ervaringen</a></li>
					<li><a href="{{ route('user.profile') }}">Toon Profiel</a></li>
					<li><a href="{{ route('logout') }}">Uitloggen</a></li>
				@else
					@include('layouts.login')
				@endif
			</ul>
		</nav>
		<!-- End Navbar -->

        <!-- Call To Action -->
		<div class="call_to_action_wrapper">
			<h1>De website om ervaringen te ontdekken</h1>
			<h2>Weet je niet wat te doen? Heb je ooit al eens iets heel speciaal willen doen? Je vind het allemaal hier!</h2>
			<a href="{{ route('discover') }}" class="button red_btn">ONTDEKKEN</a>
			<a href="{{ route('product.create') }}" class="button white_btn">AANBIEDEN</a>
		</div>
		<!-- End Call To Action -->
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>