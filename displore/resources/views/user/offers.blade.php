@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		@slot('tab')
			offers
		@endslot
		<h1>Jouw aanbiedingen</h1>
		@foreach($products as $product)
			<div class="reservation">
				<div class="reservation-text">
					{{ $product->title }}
				</div>
				<div class="right">
					<a class="button" href="{{ route('availability.create', $product->id) }}">Geef je beschikbaarheid aan</a>
					<a class="red_ghost" href="{{ route('product.edit', $product->id) }}">Bewerken</a>
				</div>
				
			</div>
		@endforeach

		@if(sizeof($products) === 0)
			<h3 class="search-fail">Je bied nog niets aan!</h3>
		@endif
	@endcomponent
	
@endsection