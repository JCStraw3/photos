@extends('app')

@section('content')

	{{-- Tag navbar --}}

	<div>
		<a href='/tags' class='pure-button button-tag new-tag-button button-small float-left'><i class='fa fa-tag'></i> Tags</a>

		<a href='/tags/create' class='pure-button pure-button-primary new-tag-button button-small float-left'><i class='fa fa-plus'></i> Tag</a>
	</div>

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific tag --}}

	<div class='card'>

		<a href='/tags/{{ $tag->id }}/edit' class='pure-button button-secondary button-xsmall pull-right card-header'><i class='fa fa-pencil-square-o'></i></a>

		<a href='/tags/{{ $tag->id }}/all' class='pure-button button-tag button-xsmall card-header float-left'>All</a>

		<h2>{{ $tag->name }}</h2>

		@foreach($photos as $photo)
			@if($photo->private === 0)
				<a href='/photos/{{ $photo->id }}'><img src='/uploads/{{ $photo->image }}' class='pure-img tag-photo pure-u-1-2'></a>
			@endif
		@endforeach

	</div>

@endsection