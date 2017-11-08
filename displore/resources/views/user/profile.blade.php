@extends('layouts.master')

@section('content')
	@component('components.user-tabs')
		@slot('tab')
			profile
		@endslot
		<div class="row">
			
		
		<div class="medium-6 columns">
			<h1>Profiel</h1>
			<form action="{{ route('user.update') }}" method="post">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				
				<div class="form-group">			
					<label for="first_name">Voornaam</label>
					<input type="text" id="first_name" value="{{ $user->first_name }}" name="first_name">
					{{ $errors->first('first_name') }}
				</div>
				<div class="form-group">
					<label for="last_name">Achternaam</label>
					<input type="text" id="last_name" value="{{ $user->last_name }}" name="last_name">
					{{ $errors->first('last_name') }}
				</div>
				<div class="form-group">
					<label for="email">Mailadres</label>
					<input type="text" id="email" value="{{ $user->email }}" name="email">
					{{ $errors->first('email') }}
				</div>
				<div class="form-group">
					<label for="street">Straatnaam</label>
					<input type="text" id="street" value="{{ $user->street }}" name="street">
					{{ $errors->first('street') }}
				</div>
				<div class="form-group">
					<label for="house_nr">Huisnummer</label>
					<input type="text" id="house_nr" value="{{ $user->house_nr }}" name="house_nr">
					{{ $errors->first('house_nr') }}
				</div>
				<div class="form-group">
					<label for="city">Stad</label>
					<input type="text" id="city" value="{{ $user->city }}" name="city">
					{{ $errors->first('city') }}
				</div>
				<div class="form-group">
					<label for="country">Land</label>
					<input type="text" id="country" value="{{ $user->country }}" name="country">
					{{ $errors->first('country') }}
				</div>
				<input type="submit" class="button red_btn" value="Gebruikersinformatie Wijzigen">
			</form>
		</div>
		
		<div class="medium-6 columns">
			<h1>Paypal Toevoegen</h1>
			<h4>Deze actie is nodig om dingen te kunnen aanbieden <!-- TODO: mag van header naar iets anders veranderen --></h4>

			<form action="{{ route('user.paypal') }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				
				<div class="form-group">
					<label for="paypal">Paypal emailadres</label>
					<input type="text" id="paypal" value="{{ $user->paypal }}" name="paypal">
					{{ $errors->first('paypal') }}
				</div>

				<input type="submit" class="button" value="Paypal toevoegen">
			</form>
		</div>
		</div>
	@endcomponent
@endsection