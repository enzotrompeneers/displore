@extends('layouts.master')

@section('content')
	<h1>Profiel</h1>
	<form action="{{ route('user.update') }}" method="post">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<label for="first_name">Voornaam</label>
		<input type="text" id="first_name" value="{{ $user->first_name }}" name="first_name">

		<label for="last_name">Achternaam</label>
		<input type="text" id="last_name" value="{{ $user->last_name }}" name="last_name">

		<label for="email">Mailadres</label>
		<input type="text" id="email" value="{{ $user->email }}" name="email">

		<label for="street">Straatnaam</label>
		<input type="text" id="street" value="{{ $user->street }}" name="street">

		<label for="house_nr">Huisnummer</label>
		<input type="text" id="house_nr" value="{{ $user->house_nr }}" name="house_nr">

		<label for="city">Stad</label>
		<input type="text" id="city" value="{{ $user->city }}" name="city">

		<label for="country">Land</label>
		<input type="text" id="country" value="{{ $user->country }}" name="country">

		<input type="submit" value="Gebruikersinformatie Wijzigen">
	</form>
@endsection