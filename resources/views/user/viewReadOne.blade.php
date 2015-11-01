@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a user's profile --}}

	<div>

		<div>

			@if($user->image)
				<img src='/uploads/{{ $user->image }}'>
			@endif
			
			<br />

			<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
				Select image to upload:
				<input name='image' type='file'>
				<input class="pure-button pure-button-primary" name='submit' type='submit' value='Save'>
			</form>

		</div>

		<a href='/user/{{ $user->id }}/edit' class="pure-button pure-button-primary"><i class="fa fa-pencil-square-o"></i></a>

		<br />

		<br />

		<div>
			{{ $user->name }}
		</div>

		<div>
			{{ $user->email }}
		</div>

		<div>
			{{ $user->gender }}
		</div>

		<div>
			{{ $user->birthday }}
		</div>

		<div>
			{{ $user->description }}
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