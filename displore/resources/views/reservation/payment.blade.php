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
	<div class="container-small">
	<div class="container-white payment">
		<div class="row payment-title-holder">
			<div class="small-12 medium-12 cell">
				<h1 class="payment-title">Betalen</h1>
				<h3 class="payment-subtitle">Betaling van: <b>{{ $reservation->product->title }}</b></h3>
			</div>
		</div>

		@if(!$reservation->paid)
		<div class="row payment-content">
			<div class="small-12 medium-12 cell">
				<h3>{{ $user->first_name }} {{ $user->last_name }}</h3>

				{{ $user->street }} {{ $user->house_nr }}
				{{ $user->city }}, {{ $user->country }}
			</div>
		</div>

		<div class="row payment-price-holder">
			<div class="small-12 medium-12 cell">
				<input type="hidden" id="reservation-id" value="{{ $reservation->id }}">
				<span>Een bedrag van</span>
				<h3><span class="payment-price">€ </span><span id="reservation-price" class="payment-price">{{ $price }}</span></h3>
			</div>
		</div>

		<div class="row payment-button-holder">
			<div class="small-12 medium-12 cell">
				<div id="paypal-button-container"></div>
			</div>
		</div>
		@else
			<div class="row">
				<div class="small-12 medium-12 cell"><h4>Betaling van deze reservatie is afgerond</h4></div>
			</div>
		@endif
		</div>
	</div>
@endsection



