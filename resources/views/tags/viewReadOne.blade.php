@extends('app')

@section('content')

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

@section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>
			<li class='pure-menu-item'><a href='/tags/create' class='pure-menu-link'><i class="fa fa-plus"></i> Tag</a></li>
		</ul>

	</div>

@endsection