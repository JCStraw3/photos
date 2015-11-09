@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a user's profile --}}

	<div class='user-card'>

		@if($authUser->id === $user->id)
			<div class='card-header'>
				<a href='/user/{{ $user->id }}/edit' class="pure-button button-secondary button-xsmall pull-right"><i class="fa fa-pencil-square-o"></i></a>
			</div>
		@endif

		<div class='user-media'>
			@if($user->image)
				<img src='/uploads/{{ $user->image }}' class="pure-img user-image">
			@endif

			@if($authUser->id === $user->id)
				<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
					Select image to upload:
					<input name='image' type='file'>
					<input class="pure-button pure-button-primary button-small" name='submit' type='submit' value='Save'>
				</form>
			@endif
		</div>

		<div class='media-text'>
			<div class='text'>
				<b>{{ $user->name }}</b>
			</div>

			<hr />

			<div class='text'>
				@if($authUser->id === $user->id)
					<a href='/comments' class="pure-button button-tag button-small"><i class="fa fa-comment"></i> Comments</a>

					<a href='/likes' class="pure-button button-tag button-small"><i class="fa fa-star"></i> Likes</a>
				@endif
			</div>

			@if($authUser->id === $user->id)
				<hr />
			@endif

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
			@if($photo->private === 0)
				<a href='/photos/{{ $photo->id }}'><img src='/uploads/{{ $photo->image }}' class="pure-img user-photo pure-u-1-3"></a>
			@endif
		@endforeach
	</div>

@endsection

{{-- @section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>
			
			<li class='pure-menu-item'><a href='/comments' class='pure-menu-link'>Comments</a></li>
			
			<li class='pure-menu-item'><a href='/likes' class='pure-menu-link'>Likes</a></li>
		</ul>

	</div>

@endsection --}}