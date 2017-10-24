@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="container-white-padding">
			
			<div class="row">
				<div class="medium-12 cell">
					<h1>Beschikbaarheid</h1>
					<h3>{{ $product->title }}</h3>
				</div>
				<hr>	
			</div>
			
			<form action="{{ route('availability.store', $product->id) }}" method="post">
				<div class="row">
					<div class="medium-12 cell">
						<h2>Geef aan wanneer je beschikbaar bent om je ervaring aan te bieden</h2>
					</div>
				</div>
				<div class="row">
					@if($product->price_time === "d")
						<div class="medium-6 cell">
							<div class="form-group">
								<label for="from">Van</label>
								<input type="datetime" id="from" name="from">
							</div>
						</div>
						<div class="medium-6 cell">
							<div class="form-group">
								<label for="to">Tot</label>
								<input type="datetime" id="to" name="to">
							</div>
						</div>
					@else
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="date">Datum</label>
								<input type="datetime" id="date" name="date" placeholder="Datum">
							</div>
						</div>
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="start_hour">Start uur</label>
								<input type="datetime" id="start_hour" name="start_hour" placeholder="Start uur">
							</div>
						</div>
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="end_hour">Eind uur</label>
								<input type="datetime" id="end_hour" name="end_hour" placeholder="Eind uur">
							</div>
						</div>
						
					@endif
				</div>
				<div class="row">
					<div class="medium-12 cell">
						<input type="submit" class="button" value="Toevoegen">
					</div>
				</div>
				
			</form>
		</div>
	</div>
@endsection