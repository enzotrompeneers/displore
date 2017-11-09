@extends('layouts.master')

@section('content')

	@component('components.user-tabs')
		@slot('tab')
			reservations
		@endslot
		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				
				
				<h1>Reservaties bij jou</h1>

				@foreach($products as $product)
					@foreach($product->reservations()->get() as $reservation)
						
						<div class="reservation">
							<div class="reservation-text">{{ $reservation->product->title }}</div>


							<div class="reservation-info">
								Door <a href="mailto: {{ $reservation->user->email }}">{{ $reservation->user->first_name . " " . $reservation->user->last_name }}</a>

								Op {{ Carbon\Carbon::parse($reservation->from)->toDateString() }}
								@if($reservation->product->price_time === "day")
									Tot en met
									{{ Carbon\Carbon::parse($reservation->to)->toDateString() }}
								@endif
							
							</div>
						</div>
					@endforeach
				@endforeach

				@if(sizeof($products) === 0)
					<h3 class="search-fail">Nog niemand heeft bij je gereserveerd!</h3>
				@endif

				<h1>Reservaties bij andere</h1>
			
				@foreach($my_reservations as $reservation)
					<div class="reservation">
						<div class="reservation-text">{{ $reservation->product->title }}</div>
			
						<div class="reservation-info">
							Door <a href="mailto: {{ $reservation->user->email }}">{{ $reservation->user->first_name . " " . $reservation->user->last_name }}</a>

							Op {{ Carbon\Carbon::parse($reservation->from)->toDateString() }}
							@if($reservation->product->price_time === "day")
								Tot en met
								{{ Carbon\Carbon::parse($reservation->to)->toDateString() }}
							@endif
						</div>

						@if(!$reservation->paid)
						<div class="right">
							<a href="{{ route('reservation.payment', $reservation->id) }}" class="button">Betalen</a>
						</div>
						@endif
					</div>
					
				@endforeach

				@if(sizeof($my_reservations) === 0)
					<h3 class="search-fail">Je hebt nog geen reservaties bij anderen gedaan!</h3>
				@endif

			</div>
		</div>
	@endcomponent

@endsection