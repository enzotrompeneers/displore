@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		<h1>Jouw aanbiedingen</h1>
		@foreach($products as $product)
			<div class="borderdiv">
				<div class="product_text">{{ $product->title }}</div><a class="red_ghost right" href="{{ route('product.edit', $product->id) }}">Bewerken</a>
			</div>
		@endforeach
	@endcomponent
	
@endsection