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
<ul class="title-area">
	<li class="header">
		<a href="/"><img src="{{asset('assets/graphics/displore_logo.svg')}}" alt="Displore"></a>
	</li>
</ul>
	<ul class="left">
		<li><a href="/">Displore</a></li>
		<li><a href="/">Home</a></li>
	</ul>
	<ul class="right">
		<li><a href="{{ route("user.offers") }}">Jouw ervaringen</a></li>
		<li><a href="login">Wat is displore?</a></li>
		<li><a href="{{ route("login") }}">Login</a></li>
	</ul>
</nav>
<!-- End Menu -->
