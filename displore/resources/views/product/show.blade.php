@extends('layouts.master')

@section('content')

	<form action="{{ route('reservation.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->id }}"/>
		<input type="hidden" name="price_time" value="{{ $product->price_time }}"/>
		<div class="row container-white-padding">
			<div class="medium-6 cell">
				@if(Auth::check())
					@if($product->user_id === Auth::user()->id)
						<a href="{{ route('product.edit', $product->id) }}">Bewerken</a>
					@endif
				@endif
				<h1>{{ $product->title }}</h1>

				<ul class="example-orbit" data-orbit>
					@foreach($images as $image)
						<li><img src="{{ asset($image->image) }}" alt="Afbeelding van {{ $product->title }}"></li>
					@endforeach
				</ul>
				<h2>Beschrijving</h2>
				<p>{{ $product->description }}</p>

				<h2>Vergelijkbare ervaringen</h2>
				@foreach($relevantProducts as $relevantProduct)
					<div class="large-6 columns">
						<a href="{{ route('product.show', $relevantProduct->id) }}">
							<img class="image_xsmall" src="{{ asset($relevantProduct->images->first()->image) }}" alt="Afbeelding van {{ $relevantProduct->title }}">
							<h2 class="h2_over_image_small">{{ $relevantProduct->title }}</h2>
						</a>
					</div>
				@endforeach

			</div>
			<div class="medium-3 cell price_container">
				<div class="price_text">{{ $product->price }} € </div> 
				<div class="per_text">per {{ $product->price_time }}</div>
				<input type="submit" id="reservation_btn" value="Reserveren"/>

			</div>
			<div class="medium-3 cell date_container">

				<label class="date_label" for="from">Van</label>
				<input type="datetime" class="span2 datetimepicker datepicker" value="" name="from" id="dpd1">
				<label class="date_label" for="to">Tot</label>
				@if ( $product->price_time === "hour" || $product->price_time === "month" || $product->price_time === "week")
					<input type="text" class="span2 datetimepicker datepicker" value="" name="to" id="dpd2" disabled>
				@else
					<input type="text" class="span2 datetimepicker datepicker" value="" name="to" id="dpd2">
				@endif
				<div class="row">
					<div class="medium-8 cell">
						<label class="date_label" for="quantity">Aantal</label>
						<input type="datetime" id="quantity" name="quantity">
					</div>
					<div class="medium-4 cell" style="display: table;">
						<label class="date_label vertical-align" style="display: table-cell; vertical-align: middle;">{{ $product->price_time }}</label>
					</div>
				</div>
			</div>
		</form>
			<div class="medium-6 cell">
				<p>Aangeboden door: {{ $product->user->first_name }} {{ $product->user->last_name }}</p>
				<p>Categorie: {{ $product->category }}</p>
				<p>Locatie: {{ $product->location }}</p>
					<div id="map"></div>
					<div id="infowindow-content">
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
					</div>
					{{ $errors->first('location') }}
				
				<h3>Recensies</h3>
				@foreach($reviews as $review)
					<b>{{ $review->user->first_name }} {{ $review->user->last_name }}</b>
					<div>{{ $review->stars }}</div>
					<p>{{ $review->text }}</p>
				@endforeach
				<h4>Nieuwe recensie schrijven</h4>
				<form action="{{ route("review.store", $product->id) }}" method="post">
					{{ csrf_field() }}
					<span>Geef een rating: <input type="number" min="0" max="5" name="stars" placeholder="0-5" /></span>
					<textarea name="text" placeholder="recensie schrijven"></textarea>
					<input type="submit" class="button" value="Recensie insturen"/>
				</form>
			</div>
@stop