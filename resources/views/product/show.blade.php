@extends('master')

@section('title', 'Product')

@section('content')

	<div style="width:200px;height:300px;border:1px solid red">
		<h4>{{ $product->name }}</h4>
		<img class="img-fluid" src="{{ asset('storage/'.$product->img_path) }}"/>
		<p>Description: {{ $product->description }}</p>
		<p>Price: {{ $product->price }}</p>

		<p>Sizes: 
		@foreach ($product->sizes as $sizes)
			<span>{{ $sizes }}</span>
		@endforeach
		</p>

	</div>
	<a href="{{ url('product/edit', $product->id) }}">Edit</a>
@endsection
