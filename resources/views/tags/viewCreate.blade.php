@extends('app')

@section('content')

	{{-- Tag navbar --}}

	<div>
		<a href='/tags' class='pure-button button-tag new-tag-button button-small float-left'><i class='fa fa-tag'></i> Tags</a>

		<a href='/tags/create' class='pure-button pure-button-primary new-tag-button button-small float-left'><i class='fa fa-plus'></i> Tag</a>
	</div>

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new tag --}}

	<div class='card'>

		<h2>New Tag</h2>

		<form action='/tags' method='post' class='pure-form pure-form-stacked media-text'>
			<fieldset>
				<input name='name' type='text' placeholder='Name' class='pure-input-1'>

				<button class='pure-button pure-button-primary pure-u-1' type='submit'>Create</button>
			</fieldset>
		</form>

	</div>

@endsection