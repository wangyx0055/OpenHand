<!doctype html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		@include('includes.navbar')
		
		@include('includes.header')
		
		<div class="oh-main">
			@yield('content')
		</div>

		@include('includes.footer')
	</body>
</html>