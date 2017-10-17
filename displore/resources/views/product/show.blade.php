@extends('layouts.master')

@section('content')

<div>
@if(Auth::check())
	@if($product->user_id === Auth::user()->id)
		<a href="{{ route('product.edit', $product->id) }}">Bewerken</a>
	@endif
@endif
<h1>{{ $product->title }}</h1>

<p>{{ $product->description }}</p>
</div>

<div>
	<form action="{{ route('reservation.store') }}" method="post">
		<h3>{{ $product->price }} per {{ $product->price_time }}</h3>

		{{ csrf_field() }}

		<input type="hidden" name="product_id" value="{{ $product->id }}">

		<label for="from">Van</label>
		<input type="datetime" id="from" name="from">

		<label for="to">Tot</label>
		<input type="datetime" id="to" name="to">

		<label for="quantity">Aantal</label>
		<input type="number" id="quantity" name="quantity">

		<input type="submit" value="Reserveren">
	</form>
</div>

<h3>Recensies</h3>

@foreach($reviews as $review)
	<b>{{ $review->title }}</b>
	<div>{{ $review->stars }}</div>
	<p>{{ $review->text }}</p>
@endforeach

<h4>Nieuwe recensie schrijven</h4>
<form action="{{ route("review.store", $product->id) }}" method="post">
	{{ csrf_field() }}
	<span>Geef een rating: <input type="number" min="0" max="5" name="stars" /></span>
	<textarea name="text"></textarea>
	<input type="submit" value="Recensie insturen"/>
</form>

@stop