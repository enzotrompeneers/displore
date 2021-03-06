@extends('layouts.master')

@section('content')
	@component('components.user-tabs')
		@slot('tab')
			password
		@endslot
		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				<h1>Wachtwoord veranderen</h1>

				<form action="{{ route('user.password_change') }}" method="post">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
			
					<div class="form-group">
						<label for="old_password">Oud wachtwoord</label>
						<input type="text" name="old_password" id="old_password">
					</div>			
					
					<div class="form-group">
						<label for="new_password">Nieuw wachtwoord</label>
						<input type="text" name="new_password" id="new_password">
					</div>
					
					<div class="form-group">
						<label for="new_password_again">Nieuw wachtwoord herhalen</label>
						<input type="text" name="new_password_again" id="new_password_again">
					</div>

					<input type="submit" class="button red_btn" value="Wijzig wachtwoord">
				</form>
			</div>
		</div>
	@endcomponent
@endsection