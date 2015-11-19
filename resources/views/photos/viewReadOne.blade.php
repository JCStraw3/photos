@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific photo --}}

	<div class='card'>

		@foreach($users as $user)
			@if($user->id === $photo->user_id)
				@if($user->id === $authUser->id)
					<a href='/user/{{ $user->id }}'><b>{{ $user->name }}</b></a>
				@elseif($user->id !== $authUser->id)
					<a href='/user/{{ $user->id }}/public'><b>{{ $user->name }}</b></a>
				@endif
			@endif
		@endforeach

		@if($photo->private === 1)
			<i class='fa fa-shield'></i>
		@endif

		@if($photo->user_id === $authUser->id)
			<form action='/photos/{{ $photo->id }}' method='post' class='pull-right card-header'>
				<input name='_method' type='hidden' value='delete'>
				<button class='pure-button button-error button-xsmall' type='submit'><i class='fa fa-times'></i></button>
			</form>

			<a href='/photos/{{ $photo->id }}/edit' class='pure-button button-secondary button-xsmall pull-right card-header'><i class='fa fa-pencil-square-o'></i></a>
		@endif

		<div class='media'>
			<img src='/uploads/{{ $photo->image }}' class='pure-img image'>
		</div>

		<div class='media-text'>

			<div id='likes' class='pull-right'>
				{{ count($photo->likes) }} likes.

				<form id='like' action='/likes' method='post' class='form'>
					<input id='likePhotoId' name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<button class='pure-button pure-button-primary button-xsmall' type='submit'><i class='fa fa-star'></i></button>
				</form>
			</div>

			<div class='text'>
				<b>{{ $photo->title }}</b>
			</div>

			<div class='text'>
				{{ $photo->description }}
			</div>

			<div class='text'>
				@foreach($photo->tags as $tag)
					<a href='/tags/{{ $tag->id }}' class='pure-button button-tag button-small'>{{ $tag->name }}</a>
				@endforeach
			</div>

			<hr />
			
			<div id='comments'>
				@foreach($photo->comments as $comment)
					<div id='comment' class='text'>
						<div class='pull-right'>
							@if($comment->user_id === $authUser->id)
								<a href='/comments/{{ $comment->id }}/edit' class='pure-button button-secondary button-xsmall'><i class='fa fa-pencil-square-o'></i></a>

								<form id='commentDeleteForm' action='/comments/{{ $comment->id }}' method='post' class='form'>
									<input id='commentDelete' name='_method' type='hidden' value='delete'>
									<button class='pure-button button-error button-xsmall' type='submit'><i class='fa fa-times'></i></button>
								</form>
							@endif
						</div>

						@foreach($users as $user)
							@if($user->id === $comment->user_id)
								@if($user->id === $authUser->id)
									<a href='/user/{{ $user->id }}'><b>{{ $user->name }}</b></a>
								@elseif($user->id !== $authUser->id)
									<a href='/user/{{ $user->id }}/public'><b>{{ $user->name }}</b></a>
								@endif
							@endif
						@endforeach
							
						{{ $comment->comment }}
					</div>
				@endforeach
			</div>

			<hr />

			<form id='commentForm' action='/comments' method='post' class='pure-form pure-form-stacked'>
				<fieldset>
					<input id='commentPhotoId' name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<textarea id='commentComment' name='comment' placeholder='Comment' class='pure-input-1'></textarea>
					<button class='pure-button pure-button-primary pure-input-1' type='submit'>Comment</button>
				</fieldset>
			</form>

		</div>

	</div>

	{{-- Ajax comment form script --}}

	<script>
		$('#commentForm').submit(function(event){
			event.preventDefault();
			var action = $('#commentForm').attr('action');
			$.ajax({
				url: action,
				method: 'post',
				data: {
					photo_id: $('#commentPhotoId').val(),
					comment: $('#commentComment').val(),
				}
			})
			.done(function(data){
				// var commentUpdate = $('#comment').data();
				// $('#comments').append(commentUpdate);
				$('#commentComment').val('');
				alert('You have commented on a photo.');
			});
		});
	</script>

	<script>
		$('#like').submit(function(event){
			event.preventDefault();
			var action = $('#like').attr('action');
			$.ajax({
				url: action,
				method: 'post',
				data: {
					photo_id: $('#likePhotoId').val(),
				}
			})
			.done(function(data){
				// var likeCount = $('#likes').data();
				// $('#likes').append(likeCount);
				alert('You have liked a photo.');
			});
		});
	</script>

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