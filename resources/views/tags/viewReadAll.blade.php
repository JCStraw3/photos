@extends('app')

@section('content')

	{{-- Tag navbar --}}

	<div>
		<a href='/tags' class="pure-button button-tag new-tag-button">Tags</a>

		<a href='/tags/create' class="pure-button pure-button-primary new-tag-button"><i class="fa fa-plus"></i> Tag</a>
	</div>

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View all tags --}}

	<div class='card'>

		<h2>Tags</h2>

		@foreach($tags as $tag)

			<div class='media-text pure-u-1-4'>
				<a href='/tags/{{ $tag->id }}' class="pure-button button-tag button-small pure-u-1">{{ $tag->name }}</a>
			</div>

		@endforeach

	</div>

@endsection