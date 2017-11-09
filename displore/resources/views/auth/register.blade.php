@extends('layouts.master')

@section('content')
<div class="container-white">
<form class="form-horizontal" method="POST" action="{{ route('register') }}" data-abide novalidate>
	{{ csrf_field() }}
	<div class="row">
		<div class="small-12 columns">
			<h1>Registreren</h1>
		</div>
	</div>
	<hr class="no-margin-top">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Voornaam <small>Verplicht</small>
			<input type="text" placeholder="Voornaam" required pattern="[a-zA-Z\s]+" name="first_name" value="{{ old('first_name') }}" >
			
			<small class="error">Verplicht veld, enkel letters!</small>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Achternaam <small>Verplicht</small>
			<input type="text" placeholder="Achternaam" required pattern="[a-zA-Z\s]+" name="last_name" value="{{ old('last_name') }}">
			<small class="error">Verplicht veld, enkel letters!</small>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Wachtwoord <small>Verplicht</small>
			<input type="password" id="password" placeholder="Wachtwoord" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$" name="password">
			<small class="error">Verplicht, Minimaal 6 karakters, Minstens 1 letter en 1 nummer!</small>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Bevestig Wachtwoord <small>Verplicht</small>
			<input type="password" placeholder="Herhaal Wachtwoord" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$" name="password_confirmation" data-equalto="password">
			<small class="error">Verplicht, Wachtwoord is niet hetzelfde!</small>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>E-mail <small>Verplicht</small>
			<input type="text" placeholder="Voornaam@email.com" required pattern="email" name="email" value="{{ old('email') }}">
			@if ($errors->has('email'))
				<strong>{{ $errors->first('email') }}</strong>
			@endif
			<small class="error">Verplicht veld, geef een geldig e-mail adres</small>
			</label>
		</div>

		<div class="small-12 medium-6 columns{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>Paypal E-mail <small>Optioneel</small>
			<input type="text" placeholder="paypal@email.com" pattern="email" name="paypal" value="{{ old('paypal') }}">
			@if ($errors->has('email'))
				<strong>{{ $errors->first('paypal') }}</strong>
			@endif
			<small class="error"> Geef een geldig Paypal E-mail adres!</small>
			</label>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Straatnaam <small>Optioneel</small>
			<input type="text" placeholder="Straatnaam" pattern="[a-zA-Z\s]+" name="street" value="{{ old('street') }}">
			<small class="error">Geef een geldige straatnaam!</small>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Huisnummer <small>Optioneel</small>
			<input type="text" placeholder="huisnummer" pattern="number" name="house_nr" value="{{ old('house_nr') }}" >
			<small class="error">Enkel cijfers!</small>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Stad <small>Optioneel</small>
			<input type="text" placeholder="Stad"  pattern="[a-zA-Z\s]+" name="city" value="{{ old('city') }}">
			<small class="error">Geef een geldige stadsnaam! !</small>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Land <small>Optioneel</small>
			<input type="text" placeholder="Land"  pattern="[a-zA-Z\s]+" name="country" value="{{ old('country') }}">
			<small class="error">Geef een geldig land!</small>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<button type="submit" class="button primary">
				Registreren
			</button>
		</div>
	</div>
</form>
</div>
@endsection

