@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific photo --}}

	<div>

		<div>

			<div>
				<img src='/uploads/{{ $photo->image }}'>
			</div>

			<a href='/photos/{{ $photo->id }}/edit' class="pure-button pure-button-primary"><i class="fa fa-pencil-square-o"></i></a>

			<div>
				{{ $photo->title }}
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
				
				<form action='/likes' method='post'>
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

		</div>

	</div>

@endsection