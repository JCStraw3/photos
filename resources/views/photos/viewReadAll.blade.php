@extends('app')

@section('content')

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
				<button type='submit'>Like</button>
			</form>

			<div>
				{{ count($photo->likes) }} likes.
			</div>

			<form action='/photos/{{ $photo->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete photo</button>
			</form>

			<div>
				<p>Comments:</p>

				<div>
					@foreach($photo->comments as $comment)
						{{ $comment->comment }}

						<form action='/comments/{{ $comment->id }}' method='post'>
							<input name='_method' type='hidden' value='delete'>
							<button type='submit'>Delete comment</button>
						</form>

						<br />
					@endforeach
				</div>

				<br />

				<form action='/comments' method='post'>
					<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<textarea name='comment' placeholder='Comment'></textarea>
					<button type='submit'>Comment</button>
				</form>
			</div>

			<br />

		@endforeach

	</div>

@endsection