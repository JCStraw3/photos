@extends('app')

@section('content')

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