@extends('app')

@section('content')

	<h2>Create Photo</h2>

	<hr />

	<div>

		<form action='/photos' method='post' enctype='multipart/form-data'>
			<input name='title' type='text' placeholder='Title'>
			<textarea name='description' type='text' placeholder='Description'></textarea>

			Select image to upload:
			<input name='image' type='file'>
			<input name='submit' type='submit' value='Create Photo'>
		</form>

	</div>

@endsection