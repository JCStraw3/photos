@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to login a user --}}

	<div>

		<h2>Login</h2>

		<div>

			<form action='/auth/login' method='post' class="pure-form pure-form-stacked">
				<fieldset>
					<input name='email' type='email' placeholder='Email' class="pure-u-1-4">

					<input name='password' type='password' placeholder='Password' class="pure-u-1-4">

					<button type='submit' class="pure-button pure-button-primary pure-u-1-4">Login</button>
				</fieldset>
			</form>

		</div>

	</div>

@endsection