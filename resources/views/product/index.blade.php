@extends('master')

@section('title', 'Men Clothes')

@section('content')
	<h1>Shop {{ $section }}'s section.</h1>

	@foreach ($products as $product)
		<a href="{{ url('product', [$product->slug]) }}">
			<div style="width:200px;height:300px;border:1px solid red">
				<h4>{{ $product->name }}</h4>
				<img class="img-fluid" src="{{ asset('storage/'.$product->img_path) }}"/>
				<p>Price: {{ $product->price }}</p>
			</div>
		</a>
	@endforeach
@endsection
