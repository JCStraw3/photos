@extends('app')

@section('content')

	{{-- Tag navbar --}}

	<div>
		<a href='/tags' class="pure-button button-tag new-tag-button">Tags</a>

		<a href='/tags/create' class="pure-button pure-button-primary new-tag-button"><i class="fa fa-plus"></i> Tag</a>
	</div>

	<!-- Flash messaging -->

	@include('partials.flash')

	{{-- View a specific tag --}}

	<div class='card'>

		<a href='/tags/{{ $tag->id }}/edit' class="pure-button button-secondary button-xsmall pull-right card-header"><i class="fa fa-pencil-square-o"></i></a>

		<h2>{{ $tag->name }}</h2>

		@foreach($tag->photos as $photo)
			<div class='media'>
				<img src='/uploads/{{ $photo->image }}' class="pure-img image">
			</div>

			<div class='media-text'>
				<a href='/photos/{{ $photo->id }}'><b>{{ $photo->title }}</b></a>
			</div>
		@endforeach

	</div>

@endsection