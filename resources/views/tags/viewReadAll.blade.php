@extends('app')

@section('content')

	{{-- Add new tag --}}

	<div>
		<a href='/tags/create' class="pure-button pure-button-primary"><i class="fa fa-plus"></i> Tag</a>
	</div>

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