@extends('layouts.master')

@section('content')
	<div class="error-page-holder">
		<img src="{{ asset('assets/graphics/404.svg') }}" alt="404 afbeelding" class="error-page-image">
		<h3 class="error-page-title">Pagina niet gevonden, Onze excuses.</h3>
	</div>
@endsection