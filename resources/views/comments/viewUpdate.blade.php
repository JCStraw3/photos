@extends('app')

@section('content')

	<h2>Edit a comment</h2>

	<hr />

	<div>

		<form action='/comments/{{ $comment->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<textarea name='comment' placeholder='Comment'>{{ $comment->comment }}</textarea>

			<button type='submit'>Save</button>
		</form>

		<form action='/comments/{{ $comment->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit'>Delete comment</button>
		</form>

	</div>

@endsection