@extends('layouts.master')

@section('content')
	<div class="row container-white">
		<h1>Ervaring bewerken</h1>
		<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="grid-container">
					<div class="grid-x grid-padding-x">
					<div class="medium-6 cell">
						<label>Titel</label>
						<input type="text" placeholder="typ hier een catchy titel" name="title" value="{{ $product->title }}">
						@if($errors->has('title'))
							<small class="error">{{ $errors->first('title') }}</small>
						@endif
			
					</div>
					<div class="medium-2 cell">
						<label>Prijs</label>
						<input type="text" placeholder="bv. 55" name="price" value="{{ $product->price }}">
						@if($errors->has('price'))
							<small class="error">{{ $errors->first('price') }}</small>
						@endif
					</div>
					<div class="medium-1 cell">
						<br>
						<label>Per</label>
					</div>
					<div class="medium-3 cell">
						<label>Periode</label>
						<select name="price_time">
							<option value="{{ $product->price_time }}">{{ $product->price_time }}</option>
							@if ($product->price_time === "Uur")
								<option value="Dag">Dag</option>
							@endif
							@if ($product->price_time === "Dag")
								<option value="Uur">Uur</option>
							@endif
					
						</select>
						@if($errors->has('price_time'))
							<small class="error">{{ $errors->first('price_time') }}</small>
						@endif
					</div>
					<div class="medium-12 cell">
						<label>Beschrijving</label>
						<textarea rows="10" type="text" placeholder="Beschrijving" name="description">{{ $product->description }}</textarea>
						@if($errors->has('description'))
							<small class="error">{{ $errors->first('description') }}</small>
						@endif
					</div>
					<div class="medium-6 cell">
						<label>Locatie</label>
						<input id="pac-input" class="controls" type="text" placeholder="{{ $product->location }}" name="location" value="{{ $product->location }}">
						<div id="map"></div>
						<div id="infowindow-content">
							<span id="place-name"  class="title"></span><br>
							<span id="place-address"></span>
						</div>
						@if($errors->has('location'))
							<small class="error">{{ $errors->first('location') }}</small>
						@endif
					</div>
					<div class="medium-6 cell">
						<label>Categorie</label>
						<select name="category" value="{{ $product->category }}"> <!-- Nakijken!!!! -->
							<option value="{{ $product->category }}">{{ $product->category }}</option>
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
					<div class="medium-6 cell">
						<label>Upload een afbeeldingen over de aanbieding</label> <!-- Nakijken!!! -->

						<div class="file-upload-holder">
							<label for="upload_image" class="button primary">Upload Afbeelding</label>
							<input type="file" class="show-for-sr" id="upload_image" name="image[]" multiple>
						</div>

						@if($errors->has('image'))
							<small class="error">{{ $errors->first('image') }}</small>
						@endif

						@foreach($images as $image)
							<div class="image medium-6 cell">
								<div class="image-overlay" data-id="{{ $image->id }}">
									<img src="{{ asset('assets/graphics/close_icon.svg') }}" class="image-delete">
									Verwijder
								</div>
								<div class="image-element">
									<img src="{{ asset($image->image) }}" alt="afbeelding van de {{ $product->title }}" >
								</div>
							</div>
								
						@endforeach

					</div>
					</div>

					<div class="medium-12 cell">
						<input type="submit" class="button primary float-left" value="Bewerking Opslaan"/>
					
		</form>
			
				<form action="{{ route('product.destroy', $product->id) }}" class="form-inline float-left" method="post">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" class="red_ghost" value="Verwijderen"/>
				</form>
			</div>
		</div>
	</div>
@endsection