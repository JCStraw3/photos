@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a user profile --}}

	<div>

		<form action='/user/{{ $user->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<input name='name' type='text' value='{{ $user->name }}' placeholder='Name'>
			<input name='email' type='email' value='{{ $user->email }}' placeholder='Email'>
			<select class='form-control' name='gender'>
				@if($user->gender)
					<option value='{{ $user->gender }}' selected>{{ $user->gender }}</option>
				@endif

				<option value='Female'>Female</option>
				<option value='Male'>Male</option>
			</select>
			<input name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
			<textarea name='description' type='text' placeholder='Description'>{{ $user->description }}</textarea>

			<button type='submit'>Save</button>
		</form>

	</div>

@endsection