@extends('app')

@section('content')

	{{-- View all comments made by a user --}}

	<h2>Comments</h2>

	<hr />

	<div>

		@foreach($comments as $comment)

			<div>
				{{ $comment->comment }}

				<a href='/comments/{{ $comment->id }}/edit'>Edit Comment</a>
			</div>

			<form action='/comments/{{ $comment->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete comment</button>
			</form>

		@endforeach

	</div>

@endsection