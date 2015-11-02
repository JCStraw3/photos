{{-- List errors --}}

@if ($errors->any())

	<div class='list-errors'>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>

@endif