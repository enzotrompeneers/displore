@extends("layouts.master")

@section('head')
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('modal')
	@component('components.modal')
		@slot('id')
			paypal-modal
		@endslot
		@slot('overlay_class')
			modal-hidden
		@endslot
		@slot('buttons')
			<div class="left"><a href="{{ route('user.reservations') }}" class="button">Ok, bedankt</a></div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="container container-white-padding">
		<div class="row">
			<div class="medium-12 cell">
				<h1>Betalen</h1>
				<h3>Betaling van: <b>{{ $reservation->product->title }}</b></h3>
			</div>
		</div>
		@if(!$reservation->paid)
		<div class="row">
			<div class="medium-6 cell">
				<h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
				<p>
					{{ $user->street }} {{ $user->house_nr }}
					{{ $user->city }}, {{ $user->country }}
				</p>
			</div>

			<div class="medium-6 cell">
				<input type="hidden" id="reservation-id" value="{{ $reservation->id }}">
				<p>Een bedrag van <h3>€ <span id="reservation-price">{{ $price }}</span></h3></p>
			</div>

		</div>

		<div class="row">
			<div class="medium-12 cell">
				<div id="paypal-button-container"></div>
			</div>
		</div>
		@else
			<h4>Betaling van deze reservatie is afgerond</h4>
		@endif
	</div>
@endsection



