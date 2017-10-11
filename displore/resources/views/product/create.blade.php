@extends('layouts.master')

@section('content')
	<h1>Maak een ervaring</h1>

	<form action="{{ route('product.store') }}" method="post">
		{{ csrf_field() }}
		<div>
			<label>Titel</label>
			<input type="text" name="title">
		</div>
		<div>
			<label>Prijs</label>
			<input type="text" name="price">
		</div>
		<div>
			<label>per</label>
			<input type="text" name="price_time">
		</div>
		<div>
			<label>Beschrijving</label>
			<textarea name="description"></textarea>
		</div>
		<div>
			<label>Locatie</label>
			<input type="text" name="location"/>
		</div>
		<div>
			<label>Categorie</label>
			<select name="category">
				<option value="auto">Auto</option>
				<option value="plaats">Plaats</option>
			</select>
		</div>
		<div>
			<label>Upload een afbeelding</label>
			<input type="file" name="image"/>
		</div>

		<input type="submit" value="Aanbieden"/>
	</form>
@endsection