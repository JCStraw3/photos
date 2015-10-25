@extends('app')

@section('content')

	<h2>Update Photo</h2>

	<hr />

	<div>

		<form action='/photos/{{ $photo->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<input name='title' type='text' value='{{ $photo->title }}' placeholder='Title'>
			<textarea name='description' type='text' placeholder='Description'>{{ $photo->description }}</textarea>
			<select name='tags[]'>
				@foreach($tags as $tag)
					<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
				@endforeach
			</select>
			
			<button type='submit'>Save</button>
		</form>

		<img src='/uploads/{{ $photo->image }}'>

	</div>

@endsection