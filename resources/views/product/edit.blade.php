@extends('master')

@section('title', 'Create new product')

@section('content')
	<h1>Edit the product</h1>

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	@endif
	<form action="{{ url('product', $product->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<label for="name">Name:</label></br>
		<input type="text" id="name" name="name" value="{{ $product->name }}" required></br>

		<label for="description">Decription:</label></br>
		<textarea type="text" id="description" name="description" required>{{ $product->description }}</textarea></br>
		
		<label for="type">Clothing Types:</label>
		<select id="type" name="type" required>
			<option value="men" >Men</option>
			<option value="women">Women</option>
			<option value="kdis">Kids</option>
		</select>

		<label for="category">Category:</label>
		<select id="category" name="category" required>
			<option value="jackets&coats">Jackets & Coats</option>
		</select>
		</br>

		<!-- Sizes field -->
		<label for="size1">XS</label>
		<input type="checkbox" id="size1" name="sizes[]" value="XS" {{ $product->sizes }}>
		</br>
		<label for="size2">S</label>
		<input type="checkbox" id="size2" name="sizes[]" value="S">
		</br>
		<label for="size3">M</label>
		<input type="checkbox" id="size3" name="sizes[]" value="M">
		</br>
		<label for="size4">L</label>
		<input type="checkbox" id="size4" name="sizes[]" value="L">
		</br>
		<label for="size5">XL</label>
		<input type="checkbox" id="size5" name="sizes[]" value="XL">
		</br>
		<label for="size6">XXL</label>
		<input type="checkbox" id="size6" name="sizes[]" value="XXL">
		</br>

		<label for="price">Price:</label>
		<input type="text" id="price" name="price" value="{{ old('price') }}"></br>

		<label for="images">Upload Images:</label>
		<input type="file" id="images" name="images"><br>

		</br></br>
		<input type="submit" value="add">
	</form>
@endsection
