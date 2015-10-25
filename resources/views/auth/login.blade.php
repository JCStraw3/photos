@extends('app')

@section('content')

	<h2>Login</h2>

	<hr />

	<div>

		<form action='auth/login' method='post'>

			<input name='email' type='email' placeholder='Email'>
			<input name='password' type='password' placeholder='Password'>

			<button type='submit'>Login</button>

		</form>

	</div>

@endsection