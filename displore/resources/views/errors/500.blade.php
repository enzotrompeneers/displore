@extends('layouts.master')

@section('content')
	<div class="error-page-holder">
		<img src="{{ asset('assets/graphics/500.svg') }}" alt="500 afbeelding" class="error-page-image">
		<h3 class="error-page-title">Onze website doet rare dingen. Sorry :(</h3>
	</div>

@endsection