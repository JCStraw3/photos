@extends('app')

@section('content')

	<div>
		{{ $user->name }}
	</div>

	<div>
		{{ $user->email }}
	</div>

	<div>
		{{ $user->gender }}
	</div>

	<div>
		{{ $user->birthday }}
	</div>

	<div>
		{{ $user->description }}
	</div>

	<div>

		@if($user->image)
			<img src='/uploads/{{ $user->image }}'>
		@endif
		
		<br />

		<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
			Select image to upload:
			<input name='image' type='file'>
			<input name='submit' type='submit' value='Upload Image'>
		</form>

	</div>

@endsection