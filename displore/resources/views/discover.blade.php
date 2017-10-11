@extends('layouts.master')

@section('content')
<h1>home page</h1>

<form action="{{ route('discover.search') }}" method="post">
	{{ csrf_field() }}
	<input type="search" name="search_input" id="search_input">
	<input type="submit" value="Zoeken">
</form>

@if(isset($search_term))
	<h2>Zoeken naar: {{ $search_term }}</h2>
@endif

@foreach($products as $product)
	{{ $product->title }}
@endforeach

@stop