@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="container-white">
			
			<div class="row">
				<div class="medium-12 columns">
					<h1>Beschikbaarheid</h1>
					<h3>{{ $product->title }}</h3>
				</div>
					
			</div>
			<hr>
			<form action="{{ route('availability.store', $product->id) }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="medium-12 columns">
						@if($product->price_time === "day")
							<h2>Geef aan wanneer je beschikbaar bent om je ervaring aan te bieden</h2>
						@else 
							<h2>Maak een sessie aan die gebruikers kunnen boeken.</h2>
						@endif
					</div>
				</div>
				<div class="row">
					@if($product->price_time === "day")
						<div class="medium-6 columns">
							<div class="form-group">
								<label for="from">Van</label>
								<input type="datetime" class="datetimepicker datepicker" id="from" name="from" placeholder="Begin datum">
							</div>
							@if($errors->has('from'))
								<small class="error">{{ $errors->first('from') }}</small>
							@endif
						</div>
						<div class="medium-6 columns">
							<div class="form-group">
								<label for="to">Tot</label>
								<input type="datetime" class="datetimepicker datepicker" id="to" name="to" placeholder="Eind datum">
							</div>
							@if($errors->has('to'))
								<small class="error">{{ $errors->first('to') }}</small>
							@endif
						</div>
						<input type="hidden" name="capacity" value="1">
					@else
						<div class="medium-4 columns">
							<div class="form-group">
								<label for="from">Datum</label>
								<input type="datetime" class="datetimepicker datepicker" id="from" name="from" placeholder="Datum">
							</div>
							@if($errors->has('from'))
								<small class="error">{{ $errors->first('from') }}</small>
							@endif
						</div>
						<div class="medium-4 columns">
							<div class="form-group">
								<label for="start_hour">Start uur</label>
								<input type="datetime" class="datetimepicker timepicker" id="start_hour" name="start_hour" placeholder="Start uur" value="12:00">
							</div>
							@if($errors->has('start_hour'))
								<small class="error">{{ $errors->first('start_hour') }}</small>
							@endif
						</div>
						<div class="medium-4 columns">
							<div class="form-group">
								<label for="end_hour">Eind uur</label>
								<input type="datetime" class="datetimepicker timepicker" id="end_hour" name="end_hour" placeholder="Eind uur" value="12:00">
							</div>
							@if($errors->has('end_hour'))
								<small class="error">{{ $errors->first('end_hour') }}</small>
							@endif
						</div>
						<div class="medium-12 columns">
							<div class="form-group">
								<label for="capacity">Aantal personen die kunnen reserveren voor de sessie</label>
								<input type="number" name="capacity" id="capacity" placeholder="Capaciteit" value="1">
							</div>
							@if($errors->has('capacity'))
								<small class="error">{{ $errors->first('capacity') }}</small>
							@endif
						</div>
					@endif

				</div>
				<div class="row">
					<div class="medium-12 columns">
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
			<hr>
			<div class="row">
					
				<div class="medium-12 columns">
					@if($product->price_time === "day")
						<h3>Jouw beschikbare dagen</h3>		
					@else
						<h3>Jouw sessies</h3>
					@endif
				</div>



				@foreach($availabilities as $available)									
					@if($product->price_time === "day")

						<div class="medium-4 columns">
							<div class="reservation">
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
	
						<div class="medium-12 columns">
							<div class="reservation">
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
				@if($product->price_time === "day")
					<div class="medium-4 columns end">
				@endif
			</div>
		</div>
	</div>
@endsection