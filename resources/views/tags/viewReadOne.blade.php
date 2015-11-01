@extends('app')

@section('content')

	{{-- Add new tag --}}

	<div>
		<a href='/tags/create' class="pure-button pure-button-primary"><i class="fa fa-plus"></i> Tag</a>
	</div>

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific tag --}}

	<div>

		<h2>{{ $tag->name }}</h2>

		<a href='/tags/{{ $tag->id }}/edit' class="pure-button pure-button-primary"><i class="fa fa-pencil-square-o"></i></a>

		<div>

			@foreach($tag->photos as $photo)

				<div>

					<div>
						<img src='/uploads/{{ $photo->image }}'>
					</div>

					<div>
						{{ $photo->title }}
					</div>

				</div>

			@endforeach

		</div>

	</div>

@endsection