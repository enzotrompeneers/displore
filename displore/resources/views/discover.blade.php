@extends('layouts.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
		<h1>Leuke ervaring zoeken</h1>
	</div>
</div>
<div class="row">
	<form action="{{ route('discover.search') }}" method="post">
		{{ csrf_field() }}
		<div class="large-3 columns">
			<div class="form-group">
				<label for="date">Op</label>
				<input type="text" class="datetimepicker datepicker" id="date" name="date" value="{{ today() }}">
			</div>
		</div>
		<div class="large-3 columns">
			<div class="form-group">
				<label for="category">Soort</label>
				<select name="category" id="category">
						<option value="Ervaring">Ervaring</option>
						<option value="Uitstap">Uitstap</option>
						<option value="Dienst">Dienst</option>
						<option value="Auto">Auto</option>
						<option value="Dier">Dier</option>
						<option value="Woning">Woning</option>
				</select>
			</div>
		</div>
		<div class="large-6 columns search-row-correction">
			<label for="search_input">Zoekterm</label>
			<div class="row">
				<div class="large-8 columns">
					<input type="text"  name="search_input" id="search_input" placeholder="Wat wil je ontdekken?">				
				</div>
				<div class="large-4 columns">
					<input type="submit" class="button button-search" value="Zoeken">
				</div>
			</div>
		</div>
	</form>
</div>	

<hr>

<div class="row">
	<div class="large-12 columns large-centered text-center">
		<h2>Heb je helemaal geen idee wat je wilt. Weet je niet wat te doen? Wij kiezen een coole ervaring voor jou!</h2>
	
		<a href="{{ route('product.random') }}" class="button red_ghost button-center button-random">Kies een coole ervaring voor me!</a>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		@if(isset($search_term))
			<h2>Zoeken naar: {{ $search_term }}</h2>
		@endif
	</div>
	<div class="large-12 columns">
		{{-- <h1>Ervaringen voor jou!</h1> --}}
		{{-- <ul class="example-orbit" data-orbit>
			@foreach($products as $product)
				<li>
					<a href="{{ route('product.show', $product->id) }}">
						@if(isset($product->images->first()->image))
							<img class="image_big" src="{{ asset($product->images->first()->image) }}" alt="Afbeelding van {{ $product->title }}">
						@endif
						<h2 class="h2_over_image">{{ $product->title }}</h2>
					</a>
				</li>
			@endforeach
		</ul> --}}
		
		@foreach($products as $product)
		<div class="large-6 columns">
		<a href="{{ route('product.show', $product->id) }}">
			@if(isset($product->images->first()->image))
				<img class="image_small" src="{{ asset($product->images->first()->image) }}" alt="Afbeelding van {{ $product->title }}">
			@endif
			<h2 class="h2_over_image">{{ $product->title }}</h2>
		</a>
		</div>
		@endforeach
	</div>
</div>

@stop
