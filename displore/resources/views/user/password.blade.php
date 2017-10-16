@extends('layouts.master')

@section('content')
	@component('components.user-tabs')
		<h1>Wachtwoord veranderen</h1>

		<form method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}

			<label for="old_password">Oud wachtwoord</label>
			<input type="text" name="old_password" id="old_password">

			<label for="new_password">Nieuw wachtwoord</label>
			<input type="text" name="new_password" id="new_password">

			<label for="new_password_again">Nieuw wachtwoord herhalen</label>
			<input type="text" name="new_password_again" id="new_password_again">

			<input type="submit" class="button red_btn" value="Wijzig wachtwoord">
		</form>
	@endcomponent
@endsection