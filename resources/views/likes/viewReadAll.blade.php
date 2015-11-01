@extends('app')

@section('content')

	{{-- View all likes made by a user --}}

	<h2>Likes</h2>

	<div>
		You have liked {{ count($likes) }} photos.
	</div>

	@foreach($likes as $like)
		<div>
			{{ $like->photo }}
		</div>
	@endforeach

@endsection