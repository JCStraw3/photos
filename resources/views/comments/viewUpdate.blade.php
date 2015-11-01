@extends('app')

@section('content')

	{{-- Edit a comment --}}

	<div>

		<form action='/comments/{{ $comment->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button class="pure-button" type='submit'><i class="fa fa-times"></i></button>
		</form>

		<h2>Edit Comment</h2>

		<form action='/comments/{{ $comment->id }}' method='post' class="pure-form pure-form-stacked">
			<fieldset>
				<input name='_method' type='hidden' value='put'>

				<textarea name='comment' placeholder='Comment' class="pure-input-1">{{ $comment->comment }}</textarea>

				<button class="pure-button pure-button-primary pure-u-1" type='submit'>Save</button>
			</fieldset>
		</form>

	</div>

@endsection