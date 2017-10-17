@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		<h1>Jouw aanbiedingen</h1>
		@foreach($products as $product)
			{{ $product->title }} - <a href="{{ route('product.edit', $product->id) }}">Bewerken</a>
		@endforeach
	@endcomponent
	
@endsection