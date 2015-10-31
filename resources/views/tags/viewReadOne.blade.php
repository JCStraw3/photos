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

@section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>

			<li class='pure-menu-item'><a href='/tags' class='pure-menu-link'>Tags</a></li>

			<li class='pure-menu-item'><a href='/tags/create' class='pure-menu-link'>Create Tag</a></li>
		</ul>

	</div>

@endsection