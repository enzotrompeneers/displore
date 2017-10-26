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

		<h1>Reservaties bij andere</h1>
	
		@foreach($my_reservations as $reservation)
			<div>
				<h2>{{ $reservation->product->title }}</h2>

				<div>Door <a href="mailto: {{ $reservation->user->email }}">{{ $reservation->user->first_name . " " . $reservation->user->last_name }}</a></div>

				<div>{{ $reservation->from }}</div>
				<div>{{ $reservation->to }}</div>
			</div>
			
		@endforeach


	@endcomponent

@endsection