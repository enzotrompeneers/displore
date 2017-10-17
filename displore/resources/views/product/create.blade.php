@extends('layouts.master')

@section('content')
	<div class="row container">
		<h1>Ervaring aanbieden</h1>
		<hr>

		<form action="{{ route('product.store') }}" method="post">
			{{ csrf_field() }}
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
				<div class="medium-6 cell">
					<label>Titel</label>
					<input type="text" placeholder="typ hier een catchy titel" name="title">
				</div>
				<div class="medium-2 cell">
					<label>Prijs</label>
					<input type="text" placeholder="bv. 55" name="price">
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
					<textarea rows="10" type="text" placeholder="Beschrijving" name="description"></textarea>
				</div>
				<div class="medium-6 cell">
					<label>Selecteer een locatie</label>
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
					<label>Upload een afbeeldingen over de aanbieding</label>

					<label for="exampleFileUpload" class="hollow button secondary">Upload Afbeelding</label>
					<input type="file" class="show-for-sr" name="image">
				</div>

			</div>


			<div>
				<label>Locatie</label>
				<input type="text" name="location"/>
			</div>


			<input type="submit" class="button alert" value="Aanbieden"/>
		</form>
	</div>
@endsection