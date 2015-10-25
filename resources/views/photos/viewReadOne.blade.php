@extends('app')

@section('content')

	<h2>{{ $photo->title }}</h2>

	<hr />

	<div>

		<div>
			<img src='/uploads/{{ $photo->image }}'>
		</div>

		<div>
			{{ $photo->description }}
		</div>

	</div>

@endsection