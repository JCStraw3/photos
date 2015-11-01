@extends('app')

@section('content')

	{{-- View all comments made by a user --}}

	<h2>Comments</h2>

	<hr />

	<div>

		@foreach($comments as $comment)

			{{ $comment->comment }}

			@if($comment->user_id === $user->id)
				<a href='/comments/{{ $comment->id }}/edit' class="pure-button pure-button-primary"><i class="fa fa-pencil-square-o"></i></a>

				<form action='/comments/{{ $comment->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button class="pure-button" type='submit'><i class="fa fa-times"></i></button>
				</form>
			@endif

		@endforeach

	</div>

@endsection