@extends('layouts.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
		@if(isset($search_term))
			<h1>Zoeken naar: {{ $search_term }}</h1>
		@else
			<h1>Leuke ervaring zoeken</h1>
		@endif
	</div>
</div>

<div class="row container-white">
	<form action="{{ route('discover.search') }}" method="post">
		{{ csrf_field() }}
		<div class="large-3 columns">
			<div class="form-group">
				<label for="date">Op</label>
				@if(isset($search_term))
					<input type="text" class="datetimepicker datepicker" id="date" name="date" value="{{ $datetime }}">
				@else
					<input type="text" class="datetimepicker datepicker" id="date" name="date" value="{{ today() }}">
				@endif
			</div>
		</div>
		<div class="large-3 columns">
			<div class="form-group">
				<label for="category">Soort</label>
				<select name="category" id="category" value="{{ old('category') }}">
					    <option value="">Geen categorie</option>
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
					@if(isset($search_term))
						<input type="text" name="search_input" id="search_input" value="{{ $search_term }}" placeholder="Wat wil je ontdekken?">	
					@else
						<input type="text" name="search_input" id="search_input" placeholder="Wat wil je ontdekken?">	
					@endif			
				</div>
				<div class="large-4 columns">
					<input type="submit" class="button button-search" value="Zoeken">
				</div>
			</div>
		</div>
	</form>
</div>	

{{-- <hr> --}}
<br>

@if(!isset($search_term))
<div class="row">
	<div class="large-12 columns large-centered text-center">
		<h2>Heb je helemaal geen idee wat je wilt. Weet je niet wat te doen? Wij hebben de coole ervaring die jij zoekt!</h2>
	
		<a href="{{ route('product.random') }}" class="button red_ghost button-center button-random">Kies een coole ervaring voor me!</a>
	</div>
</div>
@endif

<div class="row">		
	   
		@if(sizeof($products) !== 0)
			<div class="large-12 columns">
		   	 <h1>Leuke ervaringen</h1>
		   </div>
		   <div class="row">
			@foreach($products as $product)
			<div class="large-4 columns">
				<div class="box">
					<a href="{{ route('product.show', $product->id) }}">
						
							<div class="box-image-overlay">
								<div class="box-image-overlay-title">Bekijk meer</div> 
							</div >
							<div class="box-image-holder">
								@if(isset($product->images->first()->image))
									<img class="box-image" src="{{ asset($product->images->first()->image) }}" alt="Afbeelding van {{ $product->title }}">
								@endif
							</div>
						
					</a>
					<div class="box-details">
						<span class="box-title">{{ str_limit($product->title, 28) }}</span>
					</div>
				</div>
			</div>

			@endforeach
			</div>
		@else
			<div class="large-12 columns">
				<h3 class="search-fail">
					Niets gevonden @if(isset($search_term)) voor 
					<b>
						{{ $search_term }} 	
					</b> 
					@endif
					<b>
						@if(isset($date))
							{{ $date }}
						@endif
					</b> 
					@if(isset($category))
					met categorie 
					<b>
						{{ $category }}
					</b>
					@endif
				</h3>
			</div>
		@endif
</div>

@stop
