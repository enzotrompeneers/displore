@extends('layouts.master')

@section('content')
	<div class="row container-white">
		<h1>Ervaring bewerken</h1>
		<form action="{{ route('product.update', $product->id) }}" method="post">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="grid-container">
					<div class="grid-x grid-padding-x">
					<div class="medium-6 cell">
						<label>Titel</label>
						<input type="text" placeholder="typ hier een catchy titel" name="title" value="{{ $product->title }}">
					</div>
					<div class="medium-2 cell">
						<label>Prijs</label>
						<input type="text" placeholder="bv. 55" name="price" value="{{ $product->price }}">
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
					</div>
					<div class="medium-12 cell">
						<label>Beschrijving</label>
						<textarea rows="10" type="text" placeholder="Beschrijving" name="description">{{ $product->description }}</textarea>
					</div>
					<div class="medium-6 cell">
						<label>Selecteer een locatie</label>
						<div id="googleMap" name="location" style="width:100%;height:250px;background-color:grey;" value="{{ $product->location }}"></div> <!-- Nakijken!!! -->
					</div>
					<div class="medium-6 cell">
						<label>Categorie</label>
							<select name="category" value="{{ $product->category }}"> <!-- Nakijken!!!! -->
								<option value="ervaring">Ervaring</option>
								<option value="uitstap">Uitstap</option>
								<option value="dienst">Dienst</option>
								<option value="auto">Auto</option>
								<option value="dier">Dier</option>
								<option value="woning">Woning</option>
							</select>
					</div>
					<div class="medium-6 cell">
						<label>Upload een afbeeldingen over de aanbieding</label> <!-- Nakijken!!! -->
						<label for="upload_image" class="button primary">Upload Afbeelding</label>
						<input type="file" class="show-for-sr" id="upload_image" name="image">
					</div>
					</div>

				
					<div class="medium-12 cell">
						<input type="submit" class="button primary" value="Bewerking Opslaan"/>
					</div>	
		</form>
			<div class="medium-12 cell">
				<form action="{{ route('product.destroy') }}" method="post">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" class="red_ghost" value="Verwijderen"/>
				</form>
			</div>
		</div>
	</div>
@endsection