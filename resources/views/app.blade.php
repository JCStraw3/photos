<!DOCTYPE html>

<html>

	<head>
		<title>Photos</title>
		<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
		<link rel='stylesheet' type='text/css' href='/css/app.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
		<link href='//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css' rel='stylesheet' />
		<script src='//code.jquery.com/jquery-1.11.3.min.js'></script>
		<script src='//code.jquery.com/jquery-migrate-1.2.1.min.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js'></script>
	</head>

	<body>

		@include('partials.nav')

		@yield('toolbar')

		@yield('content')

		@include('partials.footer')

	</body>

</html>