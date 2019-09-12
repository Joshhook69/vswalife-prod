<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139396030-1"></script>

	<title>vSWALife - @yield('title')</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="/assets/images/nav_logo.png" alt="Logo" style="width:100px; height:100px;" />
			</a>
			<ul class="navbar-nav ml-right">
				<li class="nav-item">
					<a class="nav-link" href="/roster">Roster</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/register">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/fleet">Aircraft Fleet</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/contact">Contact</a>
				</li>
				<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				@if(Auth::check())
						<a class="dropdown-item" href="/test">
								Test
						</a>
				@endif
						<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
						</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
								</form>
						</div>
				</li>
			</ul>
		</nav>
		@yield('content')
	</body>
	</html>
