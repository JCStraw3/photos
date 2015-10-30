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

@section('toolbar')

	<div class="pure-menu pure-menu-horizontal">

		<ul class="pure-menu-list">

			<li class="pure-menu-item"><a href='/tags' class="pure-menu-link">Tags</a></li>

			<li class="pure-menu-item"><a href='/tags/create' class="pure-menu-link">Create Tag</a></li>
		</ul>

	</div>

@endsection