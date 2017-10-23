@extends('layouts.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
		<form action="{{ route('discover.search') }}" method="post">
			{{ csrf_field() }}
			<div class="clearfix textbox">
				<input type="search" name="search_input" id="search_input" placeholder="Wat wil je ontdekken?">
				<input type="submit" class="button float-right" value="Zoeken">
			</div>

		</form>
		@if(isset($search_term))
			<h2>Zoeken naar: {{ $search_term }}</h2>
		@endif
	</div>
	<div class="large-12 columns">
		<h1>Ervaringen voor jouw!</h1>
		
		@foreach($products as $product)
		<div class="large-6 columns">
			<a href="{{ route('product.show', $product->id) }}"> {{ $product->title }}</a>
			<a href="{{ route('product.show', $product->id) }}">
				<img class="image_small" src="{{ asset($images[$product->id-1]->image) }}" alt="Afbeelding van {{ $product->title }}">
			</a>
		</div>
		@endforeach
	</div>
</div>

@stop
