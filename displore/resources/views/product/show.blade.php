@extends('layouts.master')

@section('modal')
	@component('components.modal')
        @slot('id')
            session-modal
        @endslot
        @slot('overlay_class')
            modal-hidden
        @endslot
        @slot('content')
        	@foreach($availabilities as $available)
        		@if($available->capacity - $available->reservations !== 0)
        		<div class="row">
        			<div class="small-8 medium-8 columns">
		        		<h3>Sessie op <span id="choose-date-{{ $available->id }}">{{ $available->date->toDateString() }}</span></h3>
		        		<p>
		        			Van {{ $available->start_hour->toTimeString() }}u tot {{ $available->end_hour->toTimeString() }}u <br />
		        			Nog <b>{{ $available->capacity - $available->reservations }}</b> plaats(en) over
		        		</p>
	        		</div>
	        		<div class="small-4 medium-4 columns vertical-align">
	        			<button class="button choose-button" data-id="{{ $available->id }}">Kiezen</button>
	        		</div>
        		</div>
        		<hr>
        		@endif
        	@endforeach

        	@if(sizeof($availabilities) === 0)
        		<h4 class="search-fail">Nog geen sessies aanwezig voor deze ervaring</h4>
        	@endif
        @endslot
    @endcomponent
@endsection

@section('content')

	<form action="{{ route('reservation.store') }}" method="post" data-abide novalidate>
		{{ csrf_field() }}
		<input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"/>
		<input type="hidden" name="price_time" id="price_time" value="{{ $product->price_time }}"/>

		<div class="row container-white container-white-show small-collapse medium-collapse large-collapse no-padding-top">
			<div class="small-12 medium-6 columns">
				@if(Auth::check())
					@if($product->user_id === Auth::user()->id)
						<a class="red_ghost" href="{{ route('product.edit', $product->id) }}">Bewerken</a>
					@endif
				@endif
				<div class="small-12 medium-12 columns general-padding">
					<h1>{{ $product->title }}</h1>
				</div>

				<div class="orbit-show-page">
					<ul class="example-orbit" data-orbit>
						@foreach($images as $image)
							<li><img src="{{ asset($image->image) }}" alt="Afbeelding van {{ $product->title }}"></li>
						@endforeach
					</ul>
				</div>
				
				<div class="small-12 medium-12 columns general-padding">
					<h3>Beschrijving</h3>
					<p>{{ $product->description }}</p>
				</div>

				<div class="show-for-medium-up">

				

				<div class="row general-padding">

					<h3>Vergelijkbare ervaringen</h3>
		
					@foreach($relevantProducts as $relevantProduct)
						<div class="small-12 medium-6 large-6 columns">
							<div class="box-small">
								<a href="{{ route('product.show', $relevantProduct->id) }}">
									<div class="box-image-overlay">
										<div class="box-image-overlay-title">Bekijk meer</div> 
									</div>
									<div class="box-image-holder" style="background-image: url({{ asset($relevantProduct->images->first()->image) }})">
										@if(isset($relevantProduct->images->first()->image))
											{{-- <img class="box-image" src="{{ asset($relevantProduct->images->first()->image) }}" alt="Afbeelding van {{ $relevantProduct->title }}"> --}}
										@endif
									</div>
								</a>
								<div class="box-details">
									<div class="box-title">{{ $relevantProduct->title }}</div>
								</div>
							</div>
						</div>
		
					@endforeach
				</div>
				</div>
			</div>
			<div class="small-12 medium-3 columns price_container">
				<div class="price_text">
					{{ $product->price }} € 
				</div> 
				<div class="price_text_description">
						per 
						@if($product->price_time === "hour")
							sessie
						@else 
							dag
						@endif
					</div>
			</div>

			<div class="small-12 medium-3 columns">

				<div class="date_container" id="reservation-form">
					<label class="date_label" for="from">Wanneer?</label>
						@if ($product->price_time === "day")
							<input type="datetime" placeholder="yyyy-mm-dd" required pattern="date" name="from" id="dpd1" class="span2 datetimepicker datepicker days-check">						
						@elseif($product->price_time === "hour")
							<input type="datetime" placeholder="yyyy-mm-dd" required pattern="date" name="from" id="session-chooser" readonly>
						@endif
						<small class="error" id="date-error">Datum is niet geldig!</small>
					</label>

		
					@if ($product->price_time === "day")
						<label class="date_label" for="quantity">Hoeveel dagen?
					
						
						<input type="text" placeholder="bv. 3" required pattern="number" name="quantity" value="{{ old('quantity') }}" id="quantity" >
						<small class="error">Enkel cijfers!</small>
					</label>
					@else 
						<input type="hidden" name="quantity" value="1" id="quantity" >
					@endif

					<input type="submit" class="button red_ghost" value="Reserveren"/>
					</div>
				</div>
	</form>
				<div class="small-12 medium-6 columns">
					
					<div class="small-12 medium-12 columns general-padding">
						<p><b>Aangeboden door</b> {{ $product->user->first_name }} {{ $product->user->last_name }}</p>
						<p><b>Categorie</b> {{ $product->category }}</p>

						<div><b>Locatie</b> <span id="location">{{ $product->location }}</span></div>
					</div>

					<div class="row">
						<div class="small-12 medium-12 map-show">
							<div id="showMap" style="width:100%;height:250px;overflow: visible;"></div>
						</div>
					</div>

				
						<div class="small-12 medium-12 columns general-padding">
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
	
@stop