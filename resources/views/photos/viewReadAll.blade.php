@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all photos --}}

	@foreach ($photos as $photo)

		<div class='card'>

			<div>
				<img src='/uploads/{{ $photo->image }}' class="pure-img image">
			</div>

			<div>
				<a href='/photos/{{ $photo->id }}'>{{ $photo->title }}</a>
			</div>

			<div>
				{{ $photo->description }}
			</div>

			<div>
				@foreach($photo->tags as $tag)
					<a href='/tags/{{ $tag->id }}'>{{ $tag->name }}</a>
				@endforeach
			</div>

			<div>
				{{ count($photo->likes) }} likes.

				<form action='/likes' method='post' class='form'>
					<input name='photo_id' type='hidden' value='{{ $photo->id }}'>
					<button class="pure-button pure-button-primary" type='submit'>Like</button>
				</form>
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
							<a href='/comments/{{ $comment->id }}/edit' class="pure-button pure-button-primary"><i class="fa fa-pencil-square-o"></i></a>

							<form action='/comments/{{ $comment->id }}' method='post' class='form'>
								<input name='_method' type='hidden' value='delete'>
								<button class="button-error pure-button" type='submit'><i class="fa fa-times"></i></button>
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

		</div>

	@endforeach

@endsection