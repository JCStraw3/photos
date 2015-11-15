@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a user's profile --}}

	<div class='user-card'>

		<div class='user-media'>
			@if($user->image)
				<img src='/uploads/{{ $user->image }}' class='pure-img user-image'>
			@endif
		</div>

		<div class='media-text'>
			<div class='text'>
				<b>{{ $user->name }}</b>
			</div>

			<hr />

			<div class='text'>
				{{ $user->email }}
			</div>

			<div class='text'>
				{{ $user->gender }}

				<span> | </span>

				{{ $user->birthday }}
			</div>

			<hr />

			<div class='text'>
				{{ $user->description }}
			</div>
		</div>

	</div>

	<div class='user-photoCard'>
		@foreach($photos as $photo)
			<a href='/photos/{{ $photo->id }}'><img src='/uploads/{{ $photo->image }}' class='pure-img user-photo pure-u-1-3'></a>
		@endforeach
	</div>

	{{-- Pagination links --}}

	{!! $photos->render() !!}

@endsection