@extends('master')

@section('title', "{{ $section }}'s section")

@section('content')
	<h1>Shop {{ $section }}'s section.</h1>
	<ul class="nav flex-column">
		@foreach ($categories as $category)
			<li class="nav-item">
				<a class="nav-link active" href="{{ url('s/'.strtolower($section).'?category='.urlencode($category->slug)) }}">{{ $category->name }}</a>
			</li>
		@endforeach
	</ul>

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
