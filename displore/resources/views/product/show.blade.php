@extends('layouts.master')

@section('content')
<div class="row container-white-padding">
	<form action="{{ route('reservation.store') }}" method="post">
		<div class="grid-x grid-padding-x">
			<div class="medium-6 cell">
				@if(Auth::check())
					@if($product->user_id === Auth::user()->id)
						<a href="{{ route('product.edit', $product->id) }}">Bewerken</a>
					@endif
				@endif
				<h1>{{ $product->title }}</h1>

				<ul class="example-orbit" data-orbit>
					<li><img src="graphics/src.jpg" alt="image1"></li>
					<li><img src="graphics/src.jpg" alt="image2"></li>
					<li><img src="graphics/src.jpg" alt="image3"></li>
				</ul>
				<p>{{ $product->description }}</p>
			</div>
			<div class="medium-3 cell price_container">
				<div class="price_text">{{ $product->price }} € </div> 
				<div class="per_text">per {{ $product->price_time }}</div>
				<input type="submit" id="reservation_btn" value="Reserveren"/>

			</div>
			<div class="medium-3 cell date_container">

				<label class="date_label" for="from">Van</label>
				<!-- <input type="datetime" id="from" name="from"> -->
				<input type="datetime" class="span2" value="" id="dpd1">

				<label class="date_label" for="to">Tot</label>
				<!-- <input type="datetime" id="to" name="to"> -->
				<input type="text" class="span2" value="" id="dpd2">

				<label class="date_label" for="quantity">Aantal</label>
				<input type="datetime" id="quantity" name="quantity">
				<p>{{ $product->price_time }}</p>
			</div>
			<div class="medium-6 cell">
				<h2>Vergelijkbare ervaringen</h2>
			</div>
			<div class="medium-6 cell">
				<p>Aangeboden door: {{ $product->user_id }}</p>
				<p>Categorie: {{ $product->category }}</p>
				<p>Locatie: {{ $product->location }}</p>
				<div id="googleMap" name="location" style="width:100%;height:250px;background-color:grey;" value="{{ $product->location }}"></div> <!-- Nakijken!!! -->
				
				<h3>Recensies</h3>
				@foreach($reviews as $review)
					<b>{{ $review->title }}</b>
					<div>{{ $review->stars }}</div>
					<p>{{ $review->text }}</p>
				@endforeach
				<h4>Nieuwe recensie schrijven</h4>
				<form action="{{ route("review.store", $product->id) }}" method="post">
					{{ csrf_field() }}
					<span>Geef een rating: <input type="number" min="0" max="5" name="stars" placeholder="0-5" /></span>
					<textarea name="text" placeholder="recensie schrijven"></textarea>
					<input type="submit" value="Recensie insturen"/>
				</form>
			</div>
			
	</form>

@stop