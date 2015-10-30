{{-- Navigation bar --}}

<div class="pure-menu pure-menu-horizontal">

	<a href='/photos' class="pure-menu-heading pure-menu-link">Photos</a>

{{-- 	<ul class="pure-menu-list">
		<li class="pure-menu-item"><a href='/user/{{ $user->id }}' class="pure-menu-link">{{ $user->name }}</a></li>
		<li class="pure-menu-item"><a href='/auth/logout' class="pure-menu-link">Logout</a></li>
	</ul> --}}

	<span> | </span>

	<a href='/photos/create'>Create Photo</a>

	<span> | </span>

	<a href='/tags'>Tags</a>

	<span> | </span>

	<a href='/tags/create'>Create Tag</a>

	<span> | </span>

	@if($user)
		<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>

		<span> | </span>
	@endif

	@if($user)
		<a href='/user/{{ $user->id }}/edit'>Edit {{ $user->name }}</a>

		<span> | </span>
	@endif

	<a href='/comments'>Comments</a>

	<span> | </span>

	<a href='/likes'>Likes</a>

	<span> | </span>

	<a href='/auth/logout'>Logout</a>

{{-- 	<form action='/photos' role='search'>
		<input name='search' type="text" placeholder="Search">
		<button type="submit">Submit</button>
	</form> --}}

</div>

<hr />

{{-- <div class="pure-menu pure-menu-horizontal">

	<ul class="pure-menu-list">
		<li class="pure-menu-item"><a href='/photos/create' class="pure-menu-link">Create Photo</a></li>
		<li class="pure-menu-item"><a href='/tags' class="pure-menu-link">Tags</a></li>
		<li class="pure-menu-item"><a href='/comments' class="pure-menu-link">Comments</a></li>
		<li class="pure-menu-item"><a href='/likes' class="pure-menu-link">Likes</a></li>
	</ul>

</div>

<hr /> --}}