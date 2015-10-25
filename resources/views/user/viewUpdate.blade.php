@extends('app')

@section('content')

	<div>

		<form action='/user/{{ $user->id }}' method='post'>
			<input name='_method' type='hidden' value='put'>

			<input name='name' type='text' value='{{ $user->name }}' placeholder='Name'>
			<input name='email' type='email' value='{{ $user->email }}' placeholder='Email'>
			<input name='gender' type='text' value='{{ $user->gender }}' placeholder='Gender'>
			<input name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
			<textarea name='description' type='text' placeholder='Description'>{{ $user->description }}</textarea>

			<button type='submit'>Save</button>
		</form>

	</div>

@endsection