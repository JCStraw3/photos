@extends('app')

@section('content')

	{{-- Show home page with links to register and login --}}

	<div style='text-align:center'>

		<h1>Photos App</h1>

		<div>

			<a href='/auth/register' class="pure-button pure-button-primary pure-u-1-4">Register</a>

			<a href='/auth/login' class="pure-button pure-button-primary pure-u-1-4">Login</a>

		</div>

	</div>

@endsection