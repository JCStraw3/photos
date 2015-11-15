@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to register a new user --}}

	<div class='card'>

		<h2>Register</h2>

		<form action='/auth/register' method='post' class='pure-form pure-form-stacked media-text'>

			<input name='name' type='text' placeholder='Name' class='pure-u-1'>

			<input name='email' type='email' placeholder='Email' class='pure-u-1'>

			<input name='password' type='password' placeholder='Password' class='pure-u-1'>
			
			<input name='password_confirmation' type='password' placeholder='Confirm Password' class='pure-u-1'>

			<button type='submit' class='pure-button pure-button-primary pure-u-1'>Register</button>

		</form>

	</div>

@endsection