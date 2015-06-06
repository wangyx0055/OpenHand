<!doctype html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		@include('includes.navbar')
		
		@include('includes.header')

		@yield('content')

		@include('includes.footer')
	</body>
</html>