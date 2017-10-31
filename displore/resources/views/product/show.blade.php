@extends('layouts.master')

@section('content')

	<form action="{{ route('reservation.store') }}" method="post" data-abide novalidate>
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->id }}"/>
		<input type="hidden" name="price_time" value="{{ $product->price_time }}"/>

		<div class="row container-white-padding">
			<div class="medium-6 cell">
				@if(Auth::check())
					@if($product->user_id === Auth::user()->id)
						<a class="red_ghost" href="{{ route('product.edit', $product->id) }}">Bewerken</a>
					@endif
				@endif
				<h1>{{ $product->title }}</h1>

				<ul class="example-orbit" data-orbit>
				@foreach($images as $image)
					<li><img src="{{ asset($image->image) }}" alt="Afbeelding van {{ $product->title }}"></li>
				@endforeach

				</ul>
				<h3>Beschrijving</h3>
				<p>{{ $product->description }}</p>

				<div class="show-for-medium-up">
				<h3>Vergelijkbare ervaringen</h3>
				@foreach($relevantProducts as $relevantProduct)
					<div class="large-6 columns">
						<a href="{{ route('product.show', $relevantProduct->id) }}">
							@if(isset($relevantProduct->images->first()->image))
								<img class="image_xsmall" src="{{ asset($relevantProduct->images->first()->image) }}" alt="Afbeelding van {{ $relevantProduct->title }}">
							@endif
							<h2 class="h2_over_image_small">{{ $relevantProduct->title }}</h2>
						</a>
					</div>
				@endforeach
				</div>

			</div>
			<div class="small-12 medium-3 cell price_container">
				<div class="price_text">
					{{ $product->price }} 
					€ 
					<small>
						per 
						@if($product->price_time === "hour")
							uur
						@else 
							dag
						@endif
					</small>
				</div> 
			</div>

			<div class="small-12 medium-3 cell date_container">

				<div class="small-12 columns">
					<label class="date_label" for="from">Wanneer?</label>
						<input type="datetime" placeholder="yyyy-mm-dd" required pattern="date" name="from" id="dpd1" class="span2 datetimepicker datepicker">
						<small class="error">Datum is niet geldig!</small>
					</label>

					@if ($product->price_time === "uur")
						<label class="date_label" for="quantity">Hoeveel uren?
					@endif
					@if ($product->price_time === "dag")
						<label class="date_label" for="quantity">Hoeveel dagen?
					@endif

						<input type="text" placeholder="bv. 3" required pattern="number" name="quantity" value="{{ old('quantity') }}" id="quantity" >
						<small class="error">Enkel cijfers!</small>
					</label>

					<input type="submit" class="button red_ghost" value="Reserveren"/>
					</div>
				</div>
	</form>
				<div class="small-12 medium-6 cell">
					<div class="row">
						<div class="small-12 medium-12 cell">
							<p><b>Aangeboden door</b> {{ $product->user->first_name }} {{ $product->user->last_name }}</p>
							<p><b>Categorie</b> {{ $product->category }}</p>

							<div id="location"><b>Locatie</b> {{ $product->location }}</div>
					</div>
					<div class="row">
						<div class="small-12 medium-12 cell">
							<div id="showMap" style="width:100%;height:250px;"></div>
								{{ $errors->first('location') }}
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="small-12 medium-12 cell">
					<h3>Recensies</h3>
					@foreach($reviews as $review)
						<b class="red_text">
							<div class="left">
								{{ $review->user->first_name }} {{ $review->user->last_name }} 
							</div>
							<div class="right">
								@for ($i = 0; $i < $review->stars; $i++)
									<span class="icon">★</span>
								@endfor
							</div>
						</b>
						<br>
							<p>{{ $review->text }}</p>
							<hr>
						
					@endforeach

					@if(count($reviews) === 0)
						<h4 class="search-fail">Geen recensies voor dit product</h4>
					@endif
					<h3>Nieuwe recensie schrijven</h3>
						@include('layouts.ratings')
					</div>
				</div>
				</div>
			</div>
		</div>
	
@stop