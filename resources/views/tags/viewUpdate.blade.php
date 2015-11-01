@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a tag --}}

	<div>

		<h2>Edit Tag</h2>

		<form action='/tags/{{ $tag->id }}' method='post' class="pure-form pure-form-stacked">
			<fieldset>
				<input name='_method' type='hidden' value='put'>

				<input name='name' type='text' value='{{ $tag->name }}' placeholder='Name' class="pure-input-1">

				<button class="pure-button pure-button-primary pure-u-1" type='submit'>Save</button>
			</fieldset>
		</form>

	</div>

@endsection

@section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>
			<li class='pure-menu-item'><a href='/tags/create' class='pure-menu-link'><i class="fa fa-plus"></i> Tag</a></li>
		</ul>

	</div>

@endsection