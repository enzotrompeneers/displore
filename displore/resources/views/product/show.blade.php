@extends('master')

@section('content')
<h1>{{ $product->title }}</h1>

<h3>{{ $product->price }} per {{ $product->price_time }}</h3>

<p>{{ $product->description }}</p>


@stop