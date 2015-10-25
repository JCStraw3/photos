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

@endsection