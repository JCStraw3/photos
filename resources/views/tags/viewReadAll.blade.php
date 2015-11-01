@extends('app')

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all tags --}}

	<div>

		<h2>Tags</h2>

		@foreach($tags as $tag)

			<div>
				<a href='/tags/{{ $tag->id }}' class="pure-button pure-button-primary">{{ $tag->name }}</a>
			</div>

			<br />

		@endforeach

	</div>

@endsection

@section('toolbar')

	<div class='pure-menu pure-menu-horizontal'>

		<ul class='pure-menu-list'>
			<li class='pure-menu-item'><a href='/tags/create' class='pure-menu-link'><i class="fa fa-plus"></i> Tag</a></li>
		</ul>

	</div>

@endsection