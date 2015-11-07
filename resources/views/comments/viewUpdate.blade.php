@extends('app')

@section('content')

	{{-- Edit a comment --}}

	<div class='card'>

		@if($authUser->id === $user->id)
			@if($comment->user_id === $authUser->id)
				<form action='/comments/{{ $comment->id }}' method='post' class='pull-right card-header'>
					<input name='_method' type='hidden' value='delete'>
					<button class="pure-button button-error button-xsmall" type='submit'><i class="fa fa-times"></i></button>
				</form>
			@endif

			<h2>Edit Comment</h2>

			<form action='/comments/{{ $comment->id }}' method='post' class="pure-form pure-form-stacked media-text">
				<fieldset>
					<input name='_method' type='hidden' value='put'>

					<textarea name='comment' placeholder='Comment' class="pure-input-1">{{ $comment->comment }}</textarea>

					<button class="pure-button pure-button-primary pure-u-1" type='submit'>Save</button>
				</fieldset>
			</form>
		@endif

		@if($authUser->id !== $user->id)
			<h2>
				You are not authorized to view this page.
				<a href='/comments'>...Back</a>
			</h2>
		@endif

	</div>

@endsection