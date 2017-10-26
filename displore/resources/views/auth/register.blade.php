@extends('layouts.master')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('register') }}" data-abide novalidate>
	{{ csrf_field() }}
	<div class="row">
	<div class="small-12 columns">
		<h1>Registreren</h1>
	</div>
	<div class="small-12 columns">
		<label>Voornaam <small>Verplicht</small>
		<input type="text" placeholder="Voornaam" required pattern="alpha" name="first_name" value="{{ old('first_name') }}" >
		<small class="error">Verplicht veld, enkel letters!</small>
		</label>
	</div>

	<div class="small-12 columns">
		<label>Achternaam <small>Verplicht</small>
		<input type="text" placeholder="Achternaam" required pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" name="last_name" value="{{ old('last_name') }}">
		<small class="error">Verplicht veld, enkel letters!</small>
		</label>
	</div>

	<div class="small-12 columns{{ $errors->has('email') ? ' has-error' : '' }}">
		<label>E-mail <small>Verplicht</small>
		<input type="text" placeholder="Voornaam@email.com" required pattern="email" name="email" value="{{ old('email') }}">
		@if ($errors->has('email'))
			<strong>{{ $errors->first('email') }}</strong>
		@endif
		<small class="error">Verplicht veld, geef een geldig e-mail adres</small>
		</label>
	</div>

	<div class="small-6 columns">
		<label>Wachtwoord <small>Verplicht</small>
		<input type="password" id="password" placeholder="Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password">
		<small class="error">Verplicht, Minimaal 6 karakters, Minstens 1 letter en 1 nummer!</small>
		</label>
	</div>

	<div class="small-6 columns">
		<label>Bevestig Wachtwoord <small>Verplicht</small>
		<input type="password" placeholder="Herhaal Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password_confirmation" data-equalto="password">
		<small class="error">Verplicht, Wachtwoord is niet hetzelfde!</small>
		</label>
	</div>
	</div>

	<div class="row">
	<div class="small-6 columns">
		<label>Straatnaam <small>Optioneel</small>
		<input type="text" placeholder="Straatnaam" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" name="street" value="{{ old('street') }}">
		<small class="error">Enkel letters, geen speciale tekens of nummers!</small>
		</label>
	</div>

	<div class="small-6 columns">
		<label>Huisnummer <small>Optioneel</small>
		<input type="text" placeholder="Huisnummer"  pattern"integer" name="house_nr" value="{{ old('house_nr') }}">
		<small class="error">Enkel cijfers!</small>
		</label>

	</div>
	<div class="small-12 columns">
		<label>Stad <small>Optioneel</small>
		<input type="text" placeholder="Stad"  pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" name="city" value="{{ old('city') }}">
		<small class="error">Enkel letters, geen speciale tekens of nummers !</small>
		</label>
	</div>

	<div class="small-12 columns">
		<label>Land <small>Optioneel</small>
		<input type="text" placeholder="Land"  pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" name="country" value="{{ old('country') }}">
		<small class="error">Enkel letters, geen speciale tekens of nummers!</small>
		</label>
	</div>

	<div class="medium-12 cell"{{ $errors->has('paypal') ? ' has-error' : '' }}>
		<h2>Paypal is nodig als u iets wil aanbieden</h2>
		<label>Paypal E-mail <small>Optioneel</small>
		<input type="text" placeholder="Voornaam@mail.com"  pattern="email" name="paypal" value="{{ old('paypal') }}">
		@if ($errors->has('email'))
			<strong>{{ $errors->first('paypal') }}</strong>
		@endif
		<small class="error"> Geef een geldig Paypal E-mail adres!</small>
		</label>
	</div>

	<div class="small-12 columns">
		<button type="submit" class="button primary">
			Registreren
		</button>
	</div>
	</div>
</form>
@endsection

