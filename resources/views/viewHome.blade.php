@extends('app')

@section('content')

	{{-- Show home page with links to register and login --}}

	<div class='card'>

		<h1>Photos App</h1>

		<div class='media-text'>

			<div class='text'>
				<a href='/auth/login' class='pure-button pure-button-primary pure-u-1'>Login</a>
			</div>

			<div class='text'>
				<a href='/auth/register' class='pure-button pure-button-primary pure-u-1'>Register</a>
			</div>

		</div>

	</div>

@endsection