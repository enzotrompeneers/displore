@extends('layouts.master')

@section('content')
<div class="row">
	<form action="{{ route('discover.search') }}" method="post">
		{{ csrf_field() }}
		<div class="large-11 columns">
			<input type="search" name="search_input" id="search_input" placeholder="Wat wil je ontdekken?">
		</div>
		<div class="large-1 columns">
			<input type="submit" class="button float-right" value="Zoeken">
		</div>
	</form>
</div>	

<div class="row">
	<div class="large-12 columns">
		@if(isset($search_term))
			<h2>Zoeken naar: {{ $search_term }}</h2>
		@endif
	</div>
	<div class="large-12 columns">
		<h1>Ervaringen voor jouw!</h1>
		<ul class="example-orbit" data-orbit>
			@foreach($products as $product)
				<li>
					<a href="{{ route('product.show', $product->id) }}">
						<img class="image_big" src="{{ asset($images[$product->id-1]->image) }}" alt="Afbeelding van {{ $product->title }}">
						<h2 class="h2_over_image">{{ $product->title }}</h2>
					</a>
				</li>
			@endforeach
		</ul>
		
		@foreach($products as $product)
		<div class="large-6 columns">
		<a href="{{ route('product.show', $product->id) }}">
			<img class="image_small" src="{{ asset($images[$product->id-1]->image) }}" alt="Afbeelding van {{ $product->title }}">
			<h2 class="h2_over_image">{{ $product->title }}</h2>
		</a>
		</div>
		@endforeach
	</div>
</div>

@stop
