@extends('app')

@section('content')

	<div>

		<form action='/tags/{{ $tag->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<input name='name' type='text' value='{{ $tag->name }}' placeholder='Name'>

			<button type='submit'>Update Tag</button>
		</form>

	</div>

@endsection