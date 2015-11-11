@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific photo --}}

	<div class='card'>

		@foreach($users as $user)
			@if($user->id === $photo->user_id)
				<a href='/user/{{ $user->id }}'><b>{{ $user->name }}</b></a>
			@endif
		@endforeach

		@if($photo->user_id === $authUser->id)
			<form action='/photos/{{ $photo->id }}' method='post' class='pull-right card-header'>
				<input name='_method' type='hidden' value='delete'>
				<button class="pure-button button-error button-xsmall" type='submit'><i class="fa fa-times"></i></button>
			</form>

			<a href='/photos/{{ $photo->id }}/edit' class="pure-button button-secondary button-xsmall pull-right card-header"><i class="fa fa-pencil-square-o"></i></a>
		@endif

		<div class='media'>
			<img src='/uploads/{{ $photo->image }}' class="pure-img image">
		</div>

		<div class='media-text'>

			<div class='pull-right'>
				{{ count($photo->likes) }} likes.

				<form action='/likes' method='post' class='form'>
					<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<button class="pure-button pure-button-primary button-xsmall" type='submit'><i class="fa fa-star"></i></button>
				</form>
			</div>

			<div class='text'>
				<b>{{ $photo->title }}</b>
			</div>

			<div class='text'>
				{{ $photo->description }}
			</div>

			<div class='text'>
				Privacy: {{ $photo->private }}
			</div>

			<div class='text'>
				User: {{ $photo->user_id }}
			</div>

			<div class='text'>
				@foreach($photo->tags as $tag)
					<a href='/tags/{{ $tag->id }}' class="pure-button button-tag button-small">{{ $tag->name }}</a>
				@endforeach
			</div>

			<hr />
			
			@foreach($photo->comments as $comment)
				<div class='text'>
					@foreach($users as $user)
						@if($user->id === $comment->user_id)
							<a href='/user/{{ $user->id }}'><b>{{ $user->name }}</b></a>
						@endif
					@endforeach
						
					{{ $comment->comment }}

					<div class='pull-right'>
						@if($comment->user_id === $authUser->id)
							<a href='/comments/{{ $comment->id }}/edit' class="pure-button button-secondary button-xsmall"><i class="fa fa-pencil-square-o"></i></a>

							<form action='/comments/{{ $comment->id }}' method='post' class='form'>
								<input name='_method' type='hidden' value='delete'>
								<button class="pure-button button-error button-xsmall" type='submit'><i class="fa fa-times"></i></button>
							</form>
						@endif
					</div>
				</div>
			@endforeach

			<hr />

			<form action='/comments' method='post' class="pure-form pure-form-stacked">
				<fieldset>
					<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<textarea name='comment' placeholder='Comment' class="pure-input-1"></textarea>
					<button class="pure-button pure-button-primary pure-input-1" type='submit'>Comment</button>
				</fieldset>
			</form>

		</div>

	</div>

@endsection