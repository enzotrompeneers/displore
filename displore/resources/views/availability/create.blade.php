@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="container-white">
			
			<div class="row">
				<div class="medium-12 cell">
					<h1>Beschikbaarheid</h1>
					<h3>{{ $product->title }}</h3>
				</div>
				<hr>	
			</div>
			
			<form action="{{ route('availability.store', $product->id) }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="medium-12 cell">
						@if($product->price_time === "day")
							<h2>Geef aan wanneer je beschikbaar bent om je ervaring aan te bieden</h2>
						@else 
							<h2>Maak een sessie aan die gebruikers kunnen boeken.</h2>
						@endif
					</div>
				</div>
				<div class="row">
					@if($product->price_time === "day")
						<div class="medium-6 cell">
							<div class="form-group">
								<label for="from">Van</label>
								<input type="datetime" class="datetimepicker datepicker" id="from" name="from" placeholder="Begin datum">
							</div>
						</div>
						<div class="medium-6 cell">
							<div class="form-group">
								<label for="to">Tot</label>
								<input type="datetime" class="datetimepicker datepicker" id="to" name="to" placeholder="Eind datum">
							</div>
						</div>
					@else
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="from">Datum</label>
								<input type="datetime" class="datetimepicker datepicker" id="from" name="from" placeholder="Datum">
							</div>
						</div>
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="start_hour">Start uur</label>
								<input type="datetime" class="datetimepicker timepicker" id="start_hour" name="start_hour" placeholder="Start uur" value="12:00">
							</div>
						</div>
						<div class="medium-4 cell">
							<div class="form-group">
								<label for="end_hour">Eind uur</label>
								<input type="datetime" class="datetimepicker timepicker" id="end_hour" name="end_hour" placeholder="Eind uur" value="12:00">
							</div>
						</div>
						
					@endif

				</div>
				<div class="row">
					<div class="medium-12 cell">
						@if($errors->has('overlap'))
							<small class="error">{{ $errors->first('overlap') }}</small>
						@endif
						@if($product->price_time === "day")
							<input type="submit" class="button" value="Beschikbaarheid toevoegen">
						@else 
							<input type="submit" class="button" value="Sessie Toevoegen">
						@endif
						
					</div>
				</div>
				
			</form>

			<div class="row">

				<div class="medium-12 cell">
					@if($product->price_time === "day")
						<h3>Jouw beschikbare dagen</h3>		
					@else
						<h3>Jouw sessies</h3>
					@endif
				</div>

				@foreach($availabilities as $available)									
					@if($product->price_time === "day")

						<div class="medium-4 cell">
							<div class="borderdiv">
								{{ $available->date->format("d/m/Y") }}
								<div class="right">
									<form action="{{ route("availability.destroy", $available->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" class="button" value="Delete">
									</form>
								</div>
							</div>
						</div>
					@else
	
						<div class="medium-12 cell">
							<div class="borderdiv">
									{{ $available->start_hour->format("H:i") . " Uur" }} - {{ $available->end_hour->format("H:i") . " Uur" }} op {{ $available->date->diffForHumans() }}
								<div class="right">
									<form action="{{ route("availability.destroy", $available->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" class="button" value="Delete">
									</form>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection