@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to create a new photo --}}

	<h2>Create Photo</h2>

	<hr />

	<div>

		<form class="pure-form pure-form-aligned" action='/photos' method='post' enctype='multipart/form-data'>
			<fieldset>
				<div class="pure-control-group">
					<input class="pure-input-1" name='title' type='text' placeholder='Title'>
				</div>

				<div class="pure-control-group">
					<textarea class="pure-input-1" name='description' type='text' placeholder='Description'></textarea>
				</div>
				
				<div class="pure-control-group">
					<select class="pure-input-1" name='private'>
						<option value='0'>Public</option>
						<option value='1'>Private</option>
					</select>
				</div>
				
				<div class="pure-control-group">
					<select class="pure-input-1" name='tags' multiple>
						@foreach($tags as $tag)
							<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="pure-control-group">
					Select image to upload:
					<input name='image' type='file'>
					<input class="pure-button pure-button-primary" name='submit' type='submit' value='Create Photo'>
				</div>
			</fieldset>
		</form>

	</div>

@endsection