@extends('app')

@section('content')

	<div>

		<form action='/tags' method='post'>
			<input name='name' type='text' placeholder='Name'>

			<button type='submit'>Create Tag</button>
		</form>

	</div>

@endsection