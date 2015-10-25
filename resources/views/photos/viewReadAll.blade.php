@extends('app')

@section('content')

	<h2>Photos</h2>

	<hr />

	<div>

		@foreach ($photos as $photo)

			<div>
				<img src='/uploads/{{ $photo->image }}'>
			</div>

			<div>
				<a href='/photos/{{ $photo->id }}'>{{ $photo->title }}</a>
			</div>

			<div>
				{{ $photo->description }}
			</div>

			<form action='/photos/{{ $photo->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete photo</button>
			</form>

			<br />

		@endforeach

	</div>

@endsection