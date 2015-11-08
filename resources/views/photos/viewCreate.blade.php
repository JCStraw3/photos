@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new photo --}}

	<div class='card'>

		<h2>New Photo</h2>

		<div class='media-text'>

			<form action='/photos' method='post' enctype='multipart/form-data' class='pure-form pure-form-stacked'>
				<fieldset>
					<input name='title' type='text' placeholder='Title' class='pure-input-1'>

					<textarea name='description' type='text' placeholder='Description' class='pure-input-1'></textarea>
				
					<select name='tags[]' multiple class='pure-input-1'>
						@foreach($tags as $tag)
							<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
						@endforeach
					</select>
				
					<select name='private' class='pure-input-1'>
						<option value='0'>Public</option>
						<option value='1'>Private</option>
					</select>
				
					Select image to upload: 
					<input name='image' type='file'>
					<input class='pure-button pure-button-primary pure-u-1' name='submit' type='submit' value='Create'>
				</fieldset>
			</form>

		</div>

	</div>

	{{-- Select2 scripts --}}



@endsection