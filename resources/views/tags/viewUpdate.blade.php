@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a tag --}}

	<div>

		<form action='/tags/{{ $tag->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<input name='name' type='text' value='{{ $tag->name }}' placeholder='Name'>

			<button type='submit'>Update Tag</button>
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