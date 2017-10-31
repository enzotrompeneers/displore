@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		@slot('tab')
			reservations
		@endslot
		<h1>Reservaties bij jou</h1>

		@foreach($products as $product)
			@foreach($product->reservations()->get() as $reservation)
				
				<div>
					<h2>{{ $reservation->product->title }}</h2>

					<div>Door <a href="mailto: {{ $reservation->user->email }}">{{ $reservation->user->first_name . " " . $reservation->user->last_name }}</a></div>

					<div>{{ $reservation->from }}</div>
					<div>{{ $reservation->to }}</div>
				</div>
			@endforeach
		@endforeach

		@if(sizeof($products) === 0)
			<h3 class="search-fail">Nog niemand heeft bij je gereserveerd!</h3>
		@endif

		<h1>Reservaties bij andere</h1>
	
		@foreach($my_reservations as $reservation)
			<div>
				<h2>{{ $reservation->product->title }}</h2>

				<div>Door <a href="mailto: {{ $reservation->user->email }}">{{ $reservation->user->first_name . " " . $reservation->user->last_name }}</a></div>

				<div>{{ $reservation->from }}</div>
				<div>{{ $reservation->to }}</div>
			</div>
			
		@endforeach

		@if(sizeof($my_reservations) === 0)
			<h3 class="search-fail">Je hebt nog geen reservaties bij anderen gedaan!</h3>
		@endif


	@endcomponent

@endsection