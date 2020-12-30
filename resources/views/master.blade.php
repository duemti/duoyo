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
				<a class="navbar-brand" href="/"><img src="{{ asset('imgs/logo/duoyo.svg') }}" alt="DUYO logo" /></a>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="/s/men">Men</a></li>
					<li class="nav-item"><a class="nav-link" href="/s/women">Women</a></li>
					<li class="nav-item"><a class="nav-link" href="/s/kids">Kids</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ url('product/create') }}">Add new product</a></li>
				</ul>
			</nav>
		</header>

		<div>@yield('content')</div>

		<footer>
			<p>Created by <strong><a href="https://github.com/duemti">Duemti</a></strong></p>
		</footer>
	</body>
</html>
