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
			<span class="error">Verplicht veld!</span>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Achternaam <small>Verplicht</small>
			<input type="text" placeholder="Achternaam" required pattern="[a-zA-Z\s]+" name="last_name" value="{{ old('last_name') }}">
			<span class="error">Verplicht veld!</span>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Wachtwoord <small>Verplicht</small>
			<input type="password" id="password" placeholder="Wachtwoord" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$" name="password">
			<span class="error">Verplicht veld, min. 6 karakters, minstens 1 letter en 1 nummer</span>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Bevestig Wachtwoord <small>Verplicht</small>
			<input type="password" placeholder="Herhaal Wachtwoord" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$" name="password_confirmation" data-equalto="password">
			<span class="error">Wachtwoord is niet hetzelfde!</span>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>E-mail <small>Verplicht</small>
			<input type="text" placeholder="Voornaam@email.com" required pattern="email" name="email" value="{{ old('email') }}">
			@if ($errors->has('email'))
				<span>{{ $errors->first('email') }}</span>
			@endif
			<span class="error">Verplicht veld, geef een geldig E-mail adres!</span>
			</label>
		</div>

		<div class="small-12 medium-6 columns{{ $errors->has('email') ? ' has-error' : '' }}">
			<label>Paypal E-mail <small>Optioneel</small>
			<input type="text" placeholder="paypal@email.com" pattern="email" name="paypal" value="{{ old('paypal') }}">
			@if ($errors->has('email'))
				<span>{{ $errors->first('paypal') }}</span>
			@endif
			<span class="error">Geef een geldig Paypal E-mail adres!</span>
			</label>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Straatnaam <small>Optioneel</small>
			<input type="text" placeholder="Straatnaam" pattern="[a-zA-Z\s]+" name="street" value="{{ old('street') }}">
			<span class="error">Geef een geldige straatnaam!</span>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Huisnummer <small>Optioneel</small>
			<input type="text" placeholder="huisnummer" pattern="number" name="house_nr" value="{{ old('house_nr') }}" >
			<span class="error">Enkel cijfers!</span>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-6 columns">
			<label>Stad <small>Optioneel</small>
			<input type="text" placeholder="Stad"  pattern="[a-zA-Z\s]+" name="city" value="{{ old('city') }}">
			<span class="error">Geef een geldige stadsnaam!</span>
			</label>
		</div>

		<div class="small-12 medium-6 columns">
			<label>Land <small>Optioneel</small>
			<input type="text" placeholder="Land"  pattern="[a-zA-Z\s]+" name="country" value="{{ old('country') }}">
			<span class="error">Geef een geldig land!</span>
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

