@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		@slot('tab')
			offers
		@endslot
		<h1>Jou aanbiedingen</h1>
		@foreach($products as $product)
			<div class="borderdiv">
				<div class="product_text">
					{{ $product->title }}
				</div>
				<div class="right">
					<a class="button" href="{{ route('availability.create', $product->id) }}">Geef je beschikbaarheid aan</a>
					<a class="red_ghost" href="{{ route('product.edit', $product->id) }}">Bewerken</a>
				</div>
				
			</div>
		@endforeach
	@endcomponent
	
@endsection