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

@section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>

			<li class='pure-menu-item'><a href='/tags' class='pure-menu-link'>Tags</a></li>

			<li class='pure-menu-item'><a href='/tags/create' class='pure-menu-link'>Create Tag</a></li>
		</ul>

	</div>

@endsection