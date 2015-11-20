@extends('app')

@section('content')

	{{-- View all comments made by a user --}}

	<div class='card'>

		<h2>Comments</h2>

		<div class='media-text'>

			@foreach($comments as $comment)

				<div id='comment'>

					@foreach($photos as $photo)
						@if($photo->id === $comment->photo_id)
							<div class='comment-media'>
								<a href='/photos/{{ $photo->id }}'><img src='/uploads/{{ $photo->image }}' class='pure-img comment-image'></a>
							</div>
						@endif
					@endforeach

					<div class='media-text text'>
						@if($comment->user_id === $authUser->id)
							<form id='commentDeleteForm' action='/comments/{{ $comment->id }}' method='post' class='pull-right'>
								<input id='commentDelete' name='_method' type='hidden' value='delete'>
								<button class='pure-button button-error button-xsmall' type='submit'><i class='fa fa-times'></i></button>
							</form>

							<a href='/comments/{{ $comment->id }}/edit' class='pure-button button-secondary button-xsmall pull-right'><i class='fa fa-pencil-square-o'></i></a>
						@endif

						<a href='/users/{{ $user->id }}'><b>{{ $user->name }}</b></a>

						{{ $comment->comment }}
					</div>

					<br />

					<br />

					<br />

				</div>

			@endforeach

		</div>

	</div>

	{{-- Ajax delete comment script --}}

	<script>
		$('#commentDeleteForm').submit(function(event){
			event.preventDefault();
			var action = $('#commentDeleteForm').attr('action');
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: $('#commentDelete').val(),
				}
			})
			.done(function(data){
				$('#comment').remove();
			});
		});
	</script>

@endsection