@extends('app')

@section('content')

	<a href='/photos/{{ $photo->id }}/edit'>Edit photo</a>

	<h2>{{ $photo->title }}</h2>

	<hr />

	<div>

		<div>
			<img src='/uploads/{{ $photo->image }}'>
		</div>

		<div>
			{{ $photo->description }}
		</div>

		@foreach($photo->tags as $tag)
			<div>
				<a href='/tags/{{ $tag->id }}'>{{ $tag }}</a>
			</div>
		@endforeach

		<form action='/photos/{{ $photo->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit'>Delete photo</button>
		</form>

	</div>

@endsection