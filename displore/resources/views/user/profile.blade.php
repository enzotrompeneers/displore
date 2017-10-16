@extends('layouts.master')

@section('content')
	@component('components.user-tabs')
		<h1>Profiel</h1>
		<form action="{{ route('user.update') }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			
			<div class="form-group">			
				<label for="first_name">Voornaam</label>
				<input type="text" id="first_name" value="{{ $user->first_name }}" name="first_name">
			</div>
			<div class="form-group">
				<label for="last_name">Achternaam</label>
				<input type="text" id="last_name" value="{{ $user->last_name }}" name="last_name">
			</div>
			<div class="form-group">
				<label for="email">Mailadres</label>
				<input type="text" id="email" value="{{ $user->email }}" name="email">
			</div>
			<div class="form-group">
				<label for="street">Straatnaam</label>
				<input type="text" id="street" value="{{ $user->street }}" name="street">
			</div>
			<div class="form-group">
				<label for="house_nr">Huisnummer</label>
				<input type="text" id="house_nr" value="{{ $user->house_nr }}" name="house_nr">
			</div>
			<div class="form-group">
				<label for="city">Stad</label>
				<input type="text" id="city" value="{{ $user->city }}" name="city">
			</div>
			<div class="form-group">
				<label for="country">Land</label>
				<input type="text" id="country" value="{{ $user->country }}" name="country">
			</div>
			<input type="submit" class="button red_btn" value="Gebruikersinformatie Wijzigen">
		</form>
	@endcomponent
@endsection