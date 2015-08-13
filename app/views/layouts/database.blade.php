<!doctype html>
<html>
	<head>
		@include('includes.head')
	</head>
	<body>
		@include('includes.header')
		
		@include('includes.database-navbar')

		@yield('content')
		
		<script type="text/javascript" src="http://www.openhandministry.org/js/vendor/jquery.js"></script>
		<script type="text/javascript" src="http://www.openhandministry.org/js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>