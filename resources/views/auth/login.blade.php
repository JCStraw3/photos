@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to login a user --}}

	<div class='card'>

		<h2>Login</h2>

		<form action='/auth/login' method='post' class='pure-form pure-form-stacked media-text'>
			<fieldset>
				<input name='email' type='email' placeholder='Email' class='pure-u-1'>

				<input name='password' type='password' placeholder='Password' class='pure-u-1'>

				<button type='submit' class='pure-button pure-button-primary pure-u-1'>Login</button>
			</fieldset>
		</form>

	</div>

@endsection