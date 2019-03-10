@extends('layouts.app')

@section('content')

<h1>Product</h1>

	<form method="POST" action="/products/{{ $product->id }}/edit">
			@method('PATCH')
			@csrf

			<div class="field">
				<label class="label" for="product_name">Product</label>

				<div class="control">
					<input type="text" name="product_name" placehold="Product" value="{{ $product->product_name }}">
				</div>
			</div>

			<div class="field">
				<label class="label" for="description">Description</label>

				<div class="control">
					<textarea name="description" placehold="description">{{ $product->description }}</textarea>
				</div>
			</div>

			<div class="field">
				<label class="label" for="price">Price</label>

				<div class="control">
					<input type="text" name="price" placehold="Price" value="{{ $product->price }}">
				</div>
			</div>

			<div class="field">
				<div class="control">
					<button type="submit">Update</button>
				</div>				
			</div>

		</form>

	<form method="POST" action="/products/{{ $product->id }}/edit">
		@method('DELETE')
		@csrf

			<div class="field">
				<div class="control">
					<button type="submit">Delete</button>
				</div>				
			</div>

	</form>

@endsection