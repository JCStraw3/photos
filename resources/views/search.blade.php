@extends('app')

@section('content')

	@if(!$results)
		<p>No results found.</p>
	@endif

	@foreach($results as $result)
		<p>{{ $result->name }}</p>
	@endforeach

@endsection