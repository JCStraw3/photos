@extends('app')

@section('content')

	<!-- Errors -->

	@include('errors.list')

	{{-- Form to update a user profile --}}

	<div class='card'>

		<h2>Edit Profile</h2>

		<div class='media-text'>
			<form action='/user/{{ $user->id }}' method='post' class='pure-form pure-form-stacked'>
				<fieldset>
					<input name='_method' type='hidden' value='put'>

					<input name='name' type='text' value='{{ $user->name }}' placeholder='Name' class='pure-input-1'>

					<input name='email' type='email' value='{{ $user->email }}' placeholder='Email' class='pure-input-1'>

					<select class='form-control' name='gender' class='pure-input-1'>
						@if($user->gender)
							<option value='{{ $user->gender }}' selected>{{ $user->gender }}</option>
						@endif

						<option value='Female'>Female</option>
						<option value='Male'>Male</option>
					</select>

					<input name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday' class='pure-input-1'>
					
					<textarea name='description' type='text' placeholder='Description' class='pure-input-1'>{{ $user->description }}</textarea>

					<button class='pure-button pure-button-primary pure-u-1' type='submit'>Save</button>
				</fieldset>
			</form>
		</div>

	</div>

@endsection