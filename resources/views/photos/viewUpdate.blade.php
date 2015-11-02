@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a photo --}}

	<div class='card'>

		<h2>Edit Photo</h2>

		<div>

			<div>
				<img src='/uploads/{{ $photo->image }}' class="pure-img image">
			</div>

			<div class='media-text'>
				<form action='/photos/{{ $photo->id }}' method='post' class="pure-form pure-form-stacked">
					<fieldset>
						<input name='_method' type='hidden' value='put'>

						<input name='title' type='text' value='{{ $photo->title }}' placeholder='Title' class="pure-input-1">
						
						<textarea name='description' type='text' placeholder='Description' class="pure-input-1">{{ $photo->description }}</textarea>

						<select name='tags[]' multiple class="pure-input-1">
							@foreach($tags as $tag)
								<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
							@endforeach
						</select>
					
						<select name='private' class="pure-input-1">
							<option value='0'>Public</option>
							<option value='1'>Private</option>
						</select>
						
						<button class="pure-button pure-button-primary pure-u-1" type='submit'>Save</button>
					</fieldset>
				</form>
			</div>

		</div>

	</div>

@endsection