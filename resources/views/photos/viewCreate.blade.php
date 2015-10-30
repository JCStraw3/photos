@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new photo --}}

	<h2>Create Photo</h2>

	<hr />

	<div>

		<form action='/photos' method='post' enctype='multipart/form-data'>
			<input name='title' type='text' placeholder='Title'>

			<textarea name='description' type='text' placeholder='Description'></textarea>

			<select name='private'>
				<option value='0'>Public</option>
				<option value='1'>Private</option>
			</select>
			
			<select name='tags' multiple>
				@foreach($tags as $tag)
					<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
				@endforeach
			</select>

			Select image to upload:
			<input name='image' type='file'>
			<input name='submit' type='submit' value='Create Photo'>
		</form>

	</div>

@endsection