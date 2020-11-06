<!DOCTYPE html>
<html>
	<head>
		<title>DUOYO - @yield('title')</title>

		 <!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>

		 <!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>

		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
				<a class="navbar-brand" href="/">{DUYO logo}</a>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="#">Men</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Women</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Kids</a></li>
				</ul>
			</nav>
		</header>

		<div>@yield('content')</div>

		<footer>
			<p>Developed by <em>Duemti</em></p>
		</footer>
	</body>
</html>
