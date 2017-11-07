@extends('layouts.master')

@section('modal')
	@if(Auth::user()->paypal === "" || Auth::user()->paypal === null)
		@component('components.modal')
			@slot('cancel_link')
				{{ route('discover') }}
			@endslot()
			@slot('title')
				Geen paypal
			@endslot
			@slot('content')
				Je moet een paypal e-mail hebben zodat mensen jouw kunnen betalen via het platform.
			@endslot

			@slot('buttons')
				<div class="left"><a href="{{ route('user.profile') }}" class="button">Paypal e-mail toevoegen</a></div>
				<div class="left"><a href="{{ route('discover') }}" class="button red_ghost modal-cancel">Geen aanbieding maken</a></div>
			@endslot
		@endcomponent
	@endif
@endsection

@section('content')
	<div class="row container-white">
		<h1>Ervaring aanbieden</h1>
		<hr>

		<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
				<div class="small-12 medium-6 cell">
					<label>Titel</label>
					<input type="text" placeholder="typ hier een catchy titel" name="title" value="{{ old('title') }}">
					@if($errors->has('title'))
						<small class="error">{{ $errors->first('title') }}</small>
					@endif
				</div>
				<div class="small-5 medium-2 cell">
					<label>Prijs</label>
					<input type="text" placeholder="bv. 55" name="price" value="{{ old('price') }}">
					@if($errors->has('price'))
						<small class="error">{{ $errors->first('price') }}</small>
					@endif
				</div>
				<div class="small-2 medium-1 cell">
					<br>
					<label>Per</label>
				</div>
				<div class="small-5 medium-3 cell">
					<label>Periode</label>
					<select name="price_time">
						<option value="hour">Sessie</option>
						<option value="day">Dag</option>
					</select>
					@if($errors->has('price_time'))
						<small class="error">{{ $errors->first('price_time') }}</small>
					@endif
				</div>
				<div class="small-12 medium-12 cell">
					<label>Beschrijving</label>
					<textarea rows="10" type="text" placeholder="Beschrijving" name="description">{{ old('description') }}</textarea>
					@if($errors->has('description'))
						<small class="error">{{ $errors->first('description') }}</small>
					@endif
				</div>
				<div class="small-12 medium-6 cell">
					<label>Locatie</label>
					<input id="pac-input" class="controls" type="text" placeholder="Geef een locatie" name="location" value="{{ old('location') }}">
					<div id="map"></div>
					<div id="infowindow-content">
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
					</div>
					@if($errors->has('location'))
						<small class="error">{{ $errors->first('location') }}</small>
					@endif

				</div>
				<div class="small-12 medium-6 cell">
					<label>Categorie</label>
					<select name="category" value="{{ old('category') }}">
						<option value="Ervaring">Ervaring</option>
						<option value="Uitstap">Uitstap</option>
						<option value="Dienst">Dienst</option>
						<option value="Auto">Auto</option>
						<option value="Dier">Dier</option>
						<option value="Woning">Woning</option>
					</select>
					@if($errors->has('category'))
						<small class="error">{{ $errors->first('category') }}</small>
					@endif
				</div>

				<div class="small-12 medium-6 cell">
					<label>Upload een afbeeldingen over de aanbieding</label>
					<div class="file-upload-holder">
						<label for="upload_image" class="button primary file-upload-label">Upload Afbeelding</label>
						<input type="file" class="show-for-sr file-upload" id="upload_image" name="image[]" multiple>
					</div>
					@if($errors->has('image'))
						<small class="error">{{ $errors->first('image') }}</small>
					@endif
				</div>

			</div>
			<div class="small-12 medium-12 cell">
				<input type="submit" class="button primary" value="Aanbieden"/>
			</div>
		</form>
	</div>
@endsection
