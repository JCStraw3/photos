{{-- Navigation bar --}}

<div class="pure-menu pure-menu-horizontal">

	<a href='/photos' class="pure-menu-heading pure-menu-link">Photos</a>

	<ul class="pure-menu-list">
		<li class="pure-menu-item"><a href='/photos/create' class="pure-menu-link">Create Photo</a></li>

		<span> | </span>

		@if($user)
			<li class="pure-menu-item"><a href='/user/{{ $user->id }}' class="pure-menu-link">{{ $user->name }}</a></li>

		<span> | </span>

		@endif

		@if($user)
			<li class="pure-menu-item"><a href='/auth/logout' class="pure-menu-link">Logout</a></li>
		@endif
		
	</ul>

{{-- 	<form action='/photos' role='search'>
		<input name='search' type="text" placeholder="Search">
		<button type="submit">Submit</button>
	</form> --}}

</div>