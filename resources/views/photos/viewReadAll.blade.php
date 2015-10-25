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
				{{ $photo->title }}
			</div>

			<div>
				{{ $photo->description }}
			</div>

		@endforeach

	</div>

@endsection