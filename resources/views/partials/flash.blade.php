{{-- Show flash messages --}}

@if (Session::has('flash_message'))

	<div>
		{{ Session::get('flash_message') }}
	</div>

@endif