@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific tag --}}

	<a href='/tags/{{ $tag->id }}/edit'>Edit Tag</a>

	<div>

		{{ $tag->name }}

	</div>

	<div>

		@foreach($tag->photos as $photo)

			<div>

				<div>
					<img src='/uploads/{{ $photo->image }}'>
				</div>

				<div>
					{{ $photo->description }}
				</div>

			</div>

		@endforeach

	</div>

@endsection