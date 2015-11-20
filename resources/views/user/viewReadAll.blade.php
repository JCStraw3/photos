@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all users --}}

	<div class='card'>

		<h2>Users</h2>

		@foreach($users as $user)

			<div class='media-text pure-u-1-4'>
				@if($user->id === $authUser->id)
					<a href='/user/{{ $user->id }}' class='pure-button button-tag button-small pure-u-1'>{{ $user->name }}</a>
				@elseif($user->id !== $authUser->id)
					<a href='/user/{{ $user->id }}/public' class='pure-button button-tag button-small pure-u-1'>{{ $user->name }}</a>
				@endif
			</div>

		@endforeach

	</div>

@endsection