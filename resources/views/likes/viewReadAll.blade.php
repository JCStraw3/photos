@extends('app')

@section('content')

	{{-- View all likes made by a user --}}

	<h2>Likes</h2>

	<hr />

	<div>
		You have {{ count($likes) }} likes.
	</div>

	@foreach($likes as $like)
		<div>
			{{ $like->photo }}
		</div>
	@endforeach

@endsection