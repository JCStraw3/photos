@extends('app')

@section('content')

	{{-- View all likes made by a user --}}

	<div class='card'>

		<h2>Likes</h2>

		<div class='media-text text'>
			You have liked {{ count($likes) }} photos.
		</div>

		@foreach($likes as $like)

			@foreach($photos as $photo)
				@if($photo->id === $like->photo_id)
					<img src='/uploads/{{ $photo->image }}' class='pure-img tag-photo pure-u-1-2'>
				@endif
			@endforeach

		@endforeach

	</div>

@endsection