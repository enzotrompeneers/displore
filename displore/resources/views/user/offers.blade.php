@extends('layouts.master')

@section('content')
	@foreach($products as $product)
		{{ $product->title }} - <a href="{{ route('product.edit', $product->id) }}">Bewerken</a>
	@endforeach
@endsection