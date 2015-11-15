@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- Button to view public profile --}}

	<div>
		<a href='/user/{{ $user->id }}/public' class='pure-button button-tag new-tag-button button-small float-left'>Public Profile</a>
	</div>

	{{-- View a user's profile --}}

	<div class='user-card'>

		<div class='card-header'>
			<a href='/user/{{ $user->id }}/edit' class='pure-button button-secondary button-xsmall pull-right'><i class='fa fa-pencil-square-o'></i></a>
		</div>

		<div class='user-media'>
			@if($user->image)
				<img src='/uploads/{{ $user->image }}' class='pure-img user-image'>
			@endif

			<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
				Select image to upload:
				<input name='image' type='file'>
				<input class='pure-button pure-button-primary button-small' name='submit' type='submit' value='Save'>
			</form>
		</div>

		<div class='media-text'>
			<div class='text'>
				<b>{{ $user->name }}</b>
			</div>

			<hr />

			<div class='text'>
				<a href='/comments' class='pure-button button-tag button-small'><i class='fa fa-comment'></i> Comments</a>

				<a href='/likes' class='pure-button button-tag button-small'><i class='fa fa-star'></i> Likes</a>
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