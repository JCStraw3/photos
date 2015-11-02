@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a user's profile --}}

	<div class='card'>

		<div class='card-header'>
			<a href='/user/{{ $user->id }}/edit' class="pure-button button-secondary button-xsmall pull-right"><i class="fa fa-pencil-square-o"></i></a>
		</div>

		<div class='media'>
			@if($user->image)
				<img src='/uploads/{{ $user->image }}'>
			@endif

			<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
				Select image to upload:
				<input name='image' type='file'>
				<input class="pure-button pure-button-primary button-small" name='submit' type='submit' value='Save'>
			</form>
		</div>

		<div class='media-text'>
			<div class='text'>
				<b>{{ $user->name }}</b>

				<span> | </span>

				{{ $user->email }}
			</div>

			<div class='text'>
				{{ $user->gender }}

				<span> | </span>

				{{ $user->birthday }}
			</div>

			<div class='text'>
				{{ $user->description }}
			</div>
		</div>

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