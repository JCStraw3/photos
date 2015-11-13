{{-- Navigation bar --}}

<div class='pure-menu pure-menu-horizontal'>

	<a href='/' class='pure-menu-heading pure-menu-link'>Photos</a>

	<ul class='pure-menu-list pull-right'>

		@if($user)
			<li class='pure-menu-item'><a href='/photos/create' class='pure-menu-link'><i class="fa fa-plus"></i> Photo</a></li>

			<span> | </span>

			<li class='pure-menu-item'><a href='/tags' class='pure-menu-link'><i class="fa fa-tag"></i> Tags</a></li>

			<span> | </span>

			<li class='pure-menu-item'><a href='/user/{{ $user->id }}' class='pure-menu-link'>{{ $user->name }}</a></li>

			<span> | </span>

			<li class='pure-menu-item'><a href='/auth/logout' class='pure-menu-link'><i class="fa fa-power-off"></i></a></li>
		@endif

		@if(!$user)
			<li class='pure-menu-item'><a href='/auth/login' class='pure-menu-link'>Login</a></li>

			<span> | </span>

			<li class='pure-menu-item'><a href='/auth/register' class='pure-menu-link'>Register</a></li>
		@endif
		
	</ul>

{{-- 	<form action='/photos' role='search'>
		<input name='search' type='text' placeholder='Search'>
		<button type='submit'>Submit</button>
	</form> --}}

</div>