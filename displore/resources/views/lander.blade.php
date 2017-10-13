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

		<!-- Menu -->   
		<nav class="top-bar" data-topbar>
			<ul class="title-area dropdown menu" data-dropdown-menu>
				<li class="header">
					<a href="/"><img src="{{asset('assets/graphics/displore_logo.svg')}}" alt="Displore"></a>
				</li>
			</ul>
			<ul class="left">
				<li><a href="{{ route('lander') }}">Displore</a></li>
				<li><a href="{{ route('lander') }}">Home</a></li>
			</ul>
			<ul class="right">
				<li><a href="{{ route('lander') }}">Wat is displore?</a></li>
				@if ($user = Auth::user()) 
					<li><a href="{{ route('user.offers') }}">Jouw ervaringen</a></li>
					<li><a href="{{ route('user.profile') }}">Toon Profiel</a></li>
				@else
					<li><a href="{{ route('login') }}">Login</a></li>
				@endif
			</ul>
		</nav>
		<!-- End Menu -->
    </head>
    <body>
        <!-- Call To Action -->
		<div class="call_to_action">
			<h1>De website om ervaringen te ontdekken</h1>
			<h2>Weet je niet wat te doen? Heb je ooit al eens iets heel speciaal willen doen? Je vind het allemaal hier!</h2>
			<a href="{{ route('discover') }}" class="button ontdekken">ONTDEKKEN</a>
			<a href="{{ route('product.create') }}" class="button aanbieden">AANBIEDEN</a>
		</div>
		<!-- End Call To Action -->
		<script>
			$(document).foundation();
		</script>
    </body>
</html>