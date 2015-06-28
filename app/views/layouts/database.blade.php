<!doctype html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		@include('includes.header')
		
		@include('includes.navbar')

		@yield('content')

		@include('includes.footer')
	</body>
</html>