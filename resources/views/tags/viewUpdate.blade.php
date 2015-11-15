@extends('app')

@section('content')

	{{-- Tag navbar --}}

	<div>
		<a href='/tags' class='pure-button button-tag new-tag-button button-small float-left'><i class='fa fa-tag'></i> Tags</a>

		<a href='/tags/create' class='pure-button pure-button-primary new-tag-button button-small float-left'><i class='fa fa-plus'></i> Tag</a>
	</div>

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a tag --}}

	<div class='card'>

		<h2>Edit Tag</h2>

		<form action='/tags/{{ $tag->id }}' method='post' class='pure-form pure-form-stacked media-text'>
			<fieldset>
				<input name='_method' type='hidden' value='put'>

				<input name='name' type='text' value='{{ $tag->name }}' placeholder='Name' class='pure-input-1'>

				<button class='pure-button pure-button-primary pure-u-1' type='submit'>Save</button>
			</fieldset>
		</form>

	</div>

@endsection