@extends('layouts.master')

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

@section('content')
	<div class="row container-white">
		<h1>Ervaring aanbieden</h1>
		<hr>

		<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
				<div class="medium-6 cell">
					<label>Titel</label>
					<input type="text" placeholder="typ hier een catchy titel" name="title">
					{{ $errors->first('title') }}
				</div>
				<div class="medium-2 cell">
					<label>Prijs</label>
					<input type="text" placeholder="bv. 55" name="price">
					{{ $errors->first('price') }}
				</div>
				<div class="medium-1 cell">
					<br>
					<label>Per</label>
				</div>
				<div class="medium-3 cell">
					<label>Periode</label>
					<select name="price_time">
						<option value="uur">Uur</option>
						<option value="dag">Dag</option>
						<option value="Week">Week</option>
						<option value="maand">Maand</option>
					</select>
					{{ $errors->first('price_time') }}
				</div>
				<div class="medium-12 cell">
					<label>Beschrijving</label>
					<textarea rows="10" type="text" placeholder="Beschrijving" name="description"></textarea>
					{{ $errors->first('description') }}
				</div>
				<div class="medium-6 cell">
					<label>Selecteer een locatie</label>
					<div id="googleMap" name="location" style="width:100%;height:250px;background-color:grey;"></div>
					{{ $errors->first('location') }}
				</div>
				<div class="medium-6 cell">
					<label>Categorie</label>
					<select name="category">
						<option value="ervaring">Ervaring</option>
						<option value="uitstap">Uitstap</option>
						<option value="dienst">Dienst</option>
						<option value="auto">Auto</option>
						<option value="dier">Dier</option>
						<option value="woning">Woning</option>
					</select>
					{{ $errors->first('category') }}
				</div>

				<div class="medium-6 cell">
					<label>Upload een afbeeldingen over de aanbieding</label>
					<div class="file-upload-holder">
						<label for="upload_image" class="button primary file-upload-label">Upload Afbeelding</label>
						<input type="file" class="show-for-sr file-upload" id="upload_image" name="image[]" multiple>
					</div>
					{{ $errors->first('image') }}
				</div>

			</div>
			<div class="medium-12 cell">
				<input type="submit" class="button primary" value="Aanbieden"/>
			</div>
		</form>
	</div>
@endsection