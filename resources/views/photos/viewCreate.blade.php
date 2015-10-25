@extends('app')

@section('content')

	<h2>Create Photo</h2>

	<hr />

	<div>

		<form action='/photos' method='post' enctype='multipart/form-data'>
			<input name='title' type='text' placeholder='Title'>
			<input name='description' type='text' placeholder='Description'>
			Select image to upload:
			<input name='image' type='file'>
			<input name='submit' type='submit' value='Upload Image'>
		</form>

	</div>

@endsection