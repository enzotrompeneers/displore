@extends('layouts.master')

@section('content')
<h1>{{ $product->title }}</h1>

<h3>{{ $product->price }} per {{ $product->price_time }}</h3>

<p>{{ $product->description }}</p>

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