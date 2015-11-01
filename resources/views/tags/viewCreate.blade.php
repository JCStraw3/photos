@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new tag --}}

	<div>

		<h2>New Tag</h2>

		<form action='/tags' method='post' class="pure-form pure-form-stacked">
			<fieldset>
				<input name='name' type='text' placeholder='Name' class="pure-input-1">

				<button class="pure-button pure-button-primary pure-u-1" type='submit'>Create</button>
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