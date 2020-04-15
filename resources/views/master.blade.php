<html>
<head>
	<title>
	    Dev - @yield('title')
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
	<link href="{{ asset('/assets/css/bookbutton.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151368309-1"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-151368309-1');
	</script>
	<script src="https://kit.fontawesome.com/ce18f40218.js"></script>
	<style>
		.navbar {
			background-color:#3453C4;
		}
		.nav-link {
			color:white;
			padding-left:10px;
		}
		.nav-link:hover {
			color:white;
			box-shadow: 0 2px white;
			transition: box-shadow 0.2s ease-in-out;
		}
		body {
			background-color:#3453C4;
			}
		.nav-item li {
			padding-left:10px;
		}
	</style>

	@if(Carbon\Carbon::now()->month == 12)
		{{-- Merry Christmas --}}
	 {{-- Yes Jordan I found this from u and liked it :) --}}
		<script src="/assets/js/snowstorm.js"></script>
	@endif

	</head>
<body>
	<div class="container">
	<nav class="navbar navbar-expand-sm fixed-top">
		<a class="navbar-brand" href="/" style="margin-left:20%;">
			<img src="/assets/images/nav_logo.png" alt="Logo" style="width:100px; height:100px;">
		</a>

		<ul class="navbar-nav ml-auto" style="margin-right:15%;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
			</button>
			@guest
			<li class="nav-item">
				<a class="nav-link" href="/login">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/register">Register</a>
			</li>
			@endguest
			@auth
			<li class="nav-item">
				<a class="nav-link" href="/fleet">Aircraft Fleet</a>
			</li>
			@endauth
			<li class="nav-item">
				<a class="nav-link" href="/contact">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/roster/index">Roster</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/staff">Staff</a>
			</li>
			<!-- Logout -->
			@auth
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<!-- Right Side Of Navbar -->
				<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								 {{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				@if(Auth::user()->staff == 1)
						<h6 class="dropdown-header">
								Staff
						</h6>
						<a class="dropdown-item" href="/schedule">
								Schedule
					    </a>
						<a class="dropdown-item" href="airport/index">
								Airports
						</a>
					    <div class="dropdown-divider"></div>
				@endif
				@if(Auth::user()->dispatcher == 1)
						<h6 class="dropdown-header">
							Dispatch
						</h6>
						<a class="dropdown-item" href="/booking/index">
							Booking
						</a>
						<div class="dropdown-divider"></div>
				@endif
				<a class="dropdown-item" style="margin-top:10px;" href="{{ route('logout') }}"
							onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
				</form>
			@endauth
		</div>
	</li>

</ul>
</div>
</nav>
	@yield('content')
</body>
</html>
