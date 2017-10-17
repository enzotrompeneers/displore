@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		<h1>Reservaties bij jouw</h1>

		@foreach($products as $product)
			{{ $product->title }}
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