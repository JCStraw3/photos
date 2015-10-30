@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all tags --}}

	<h2>Tags</h2>

	<hr />

	<div>

		@foreach($tags as $tag)

			<div>
				<a href='/tags/{{ $tag->id }}'>{{ $tag->name }}</a>
			</div>

		@endforeach

	</div>

@endsection