@extends('layouts.master')

@section('content')

	@foreach($product as $item)
		ID : {{ $item->id }}</br>
		Product : {{ $item->product_name }}</br>
		Description : {{ $item->description }}</br>
		Price : {{ $item->price }}</br>
		Picture : 
	@endforeach

@section('title', "$item->product_name")

	<section class="page-section clearfix">
		<div class="container">
			<div class="intro">
	<img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="/~/formal/flowerofspring/public/webimg/{{ $item->pic_name }}" alt=""></br>
</div>
</div>
</section>

	<a href="/products/{{ $item->id }}/edit">Edit</a>
	<form method="POST" action="/order/buy">
		@csrf

		<div>
			<input name="id" type="hidden" value="{{ $item->id }}">
		</div>

		<div>
			<input name="product_name" type="hidden" value="{{ $item->product_name }}">
		</div>

		<div>
			<input name="price" type="hidden" value="{{ $item->price }}">
		</div>

		<div class="field">
			<div class="control">
				Quantity : <input type="text" name="quantity">
			</div>
		</div>

		<div class="field">
			<label class="label" for="order_description">Description :</label>

			<div class="control">
					<textarea name="order_description"></textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
					<button type="submit">Buy It!!</button>
			</div>
		</div>

	</form>

@endsection