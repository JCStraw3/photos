@extends('app')

@section('content')

	<h2>Comments</h2>

	<hr />

	<div>

		@foreach($comments as $comment)

			<div>
				{{ $comment->comment }}

				<a href='/comments/{{ $comment->id }}/edit'>Edit Comment</a>
			</div>

		@endforeach

	</div>

@endsection