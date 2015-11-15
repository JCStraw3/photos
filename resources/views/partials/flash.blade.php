{{-- Show flash messages --}}

@if (Session::has('flash_message'))

	<div class='session-flash'>
		<i class='fa fa-circle'></i> {{ Session::get('flash_message') }}
	</div>

@endif