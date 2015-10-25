<div>

	<a href='/photos'>Photos</a>

	<span> | </span>

	<a href='/photos/create'>Create Photo</a>

	<span> | </span>

	<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>

	<span> | </span>

	<a href='/user/{{ $user->id }}/edit'>Edit {{ $user->name }}</a>

	<span> | </span>

	<a href='/auth/logout'>Logout</a>

</div>

<hr />