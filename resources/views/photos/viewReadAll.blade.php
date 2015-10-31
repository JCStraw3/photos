@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all photos --}}

	<h2>Photos</h2>

	<hr />

	<div>

		@foreach ($photos as $photo)

			<div>
				<img src='/uploads/{{ $photo->image }}'>
			</div>

			<div>
				<a href='/photos/{{ $photo->id }}'>{{ $photo->title }}</a>
			</div>

			<div>
				{{ $photo->description }}
			</div>

			@foreach($photo->tags as $tag)
				<div>
					<a href='/tags/{{ $tag->id }}'>{{ $tag->name }}</a>
				</div>
			@endforeach

			<form action='/likes' method='post'>
				<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
				<button class="pure-button pure-button-primary" type='submit'>Like</button>
			</form>

			<div>
				{{ count($photo->likes) }} likes.
			</div>

			<form action='/photos/{{ $photo->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button class="pure-button" type='submit'><i class="fa fa-times"></i></button>
			</form>

			<div>
				<p>Comments:</p>

				<div>
					@foreach($photo->comments as $comment)
						{{ $comment->comment }}

						@if($comment->user_id === $user->id)
							<a class="pure-button pure-button-primary" href='/comments/{{ $comment->id }}/edit'><i class="fa fa-pencil-square-o"></i></a>

							<form action='/comments/{{ $comment->id }}' method='post'>
								<input name='_method' type='hidden' value='delete'>
								<button class="pure-button" type='submit'><i class="fa fa-times"></i></button>
							</form>
						@endif

						<br />
					@endforeach
				</div>

				<br />

				<form action='/comments' method='post'>
					<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<textarea name='comment' placeholder='Comment'></textarea>
					<button class="pure-button pure-button-primary" type='submit'>Comment</button>
				</form>
			</div>

			<br />

		@endforeach

	</div>

@endsection