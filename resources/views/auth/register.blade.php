@extends('app')

@section('content')

	<h2>Register</h2>

	<hr />

	<div>

		<form action='auth/register' method='post'>

			<input name='name' type='text' placeholder='Name'>
			<input name='email' type='email' placeholder='Email'>
			<input name='password' type='password' placeholder='Password'>
			<input name='password_confirmation' type='password' placeholder='Confirm Password'>

			<button type='submit'>Register</button>

		</form>

	</div>

@endsection