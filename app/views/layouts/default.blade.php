<!doctype html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		@include('includes.header')
		
		@include('includes.navbar')
		
		<div class="main-content">
			@yield('content')
		</div>

		@include('includes.footer')
	</body>
</html>