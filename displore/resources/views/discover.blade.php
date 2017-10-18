@extends('layouts.master')

@section('content')
<h1>home page</h1>

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

@foreach($products as $product)
	<a href="{{ route('product.show', $product->id) }}"> {{ $product->title }}</a>
@endforeach

@stop