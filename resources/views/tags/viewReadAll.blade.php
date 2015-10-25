@extends('app')

@section('content')

	<div>

		@foreach($tags as $tag)

			<div>
				<a href='/tags/{{ $tag->id }}'>{{ $tag->name }}</a>
			</div>

		@endforeach

	</div>

@endsection