@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new tag --}}

	<div>

		<form action='/tags' method='post'>
			<input name='name' type='text' placeholder='Name'>

			<button type='submit'>Create Tag</button>
		</form>

	</div>

@endsection