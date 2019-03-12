@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')

	@if($users != null)

		Username : {{ $users }}</br>
	
	@endif
	
	@foreach($messages as $message)

		Title : {{ $message->title }}</br>	
		Content : {{ $message->content }}</br>
		Time : {{ $message->created_at }}</br>
		<form method="POST" action="/contact">
		@method('DELETE')
		@csrf
			<input name="id" type="hidden" value="{{ $message->id }}">
			<button type="submit">Concel</button>
		</form>	

	@endforeach

	<form method="POST" action="/contact">
		@csrf	

		<div class="field">
			<label class="label" for="Title">Title</label>
			<div class="control">
				<input type="text" name="title" required>
			</div>
		</div>

		<div class="field">
			<label class="label" for="content">Content</label>
			<div class="control">
				<textarea name="content" required></textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
			<button type="submit">Send Message</button>
			</div>
		</div>

	</form>

@endsection