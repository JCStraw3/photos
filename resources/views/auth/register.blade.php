@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to register a new user --}}

	<div>

		<h2>Register</h2>

		<div>

			<form action='/auth/register' method='post' class="pure-form pure-form-stacked">

				<input name='name' type='text' placeholder='Name' class="pure-u-1-4">

				<input name='email' type='email' placeholder='Email' class="pure-u-1-4">

				<input name='password' type='password' placeholder='Password' class="pure-u-1-4">
				
				<input name='password_confirmation' type='password' placeholder='Confirm Password' class="pure-u-1-4">

				<button type='submit' class="pure-button pure-button-primary pure-u-1-4">Register</button>

			</form>

		</div>

	</div>

@endsection