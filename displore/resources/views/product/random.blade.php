@extends('layouts.master')

@section('content')

	<div class="random">
		<img src="{{ asset('assets/graphics/displore_logo_boat.svg') }}" class="boat-animation">
		<img src="{{ asset('assets/graphics/displore_logo_water.svg') }}" class="water-animation"> 
	</div>
	<div class="random-title">
		We zijn op tocht om je ervaring te zoeken!	
	</div>

@endsection

@section('scripts')
	<script>
		window.setTimeout(function(){
			window.location.href="{!! route('product.show', $product->id) !!}";
		}, 2000);
	</script>
@endsection
