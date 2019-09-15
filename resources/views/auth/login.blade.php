<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<title>vSWALife Login Page</title>
	<META Http-equic="CACHE-CONTROL" CONTENT="NO-CACHE">

	<link href='/assets/css/font-awesome.css' rel="styleSheet" type="text/css">
	<link href='/assets/css/loginStyles.css' rel="styleSheet" type="text/css">
	<style>
		@font-face {
			font-family: SouthwestSans,Arial,Helvetica,sans-serif;
			src: url(/assets/fonts/Southwest-Bold.otf);
		}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script>

		function goSubmit() {
			submitForm();

			document.swalifeLoginForm.submit();
		}

		function loginLog(msg) {
			if (window.console) {
				console.log(msg);
			}
		}

	</script>

</head>

<body>
	<div class="centerPoint">
		<div class="loginDiv">
		    <div class="loginDivHeader"><span class="bold">vSWA</span>Life Login</div>
			<form method="POST" action="{{ route('login') }}" class="loginForm" name="swalifeLoginForm"
					target="_top"
                    onsubmit="submitForm()">
                    @csrf

					<input type="hidden" name=email>
					<input type="hidden" name=password>
					<div class="loginFields">
						<label>Email</label>
						<br>
						<input type="text" class="input @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off"/>

						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong style="color:#f54242">{{ $message }}</strong>
						</span>
						@enderror

						<br>
						<label>Password</label>
						<br>
						<input type="password" class="input @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off">
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<br>
					</div>

					<div class="loginButtons">
						@if (Route::has('password.request'))
                        <a class="forgotButton" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                        <input type="checkbox" style="margin-left:100px;" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    					<label class="form-check-label" type="checkbox"  style="color:#304CCB;">{{ __('Remember Me') }}</label>
    					<!-- Login Button -->
                        <button type="submit" style="float:right; border-radius:0px; background-color:#FFBF27; font-size:1.3em; font-weight: 300; font-style:italic; display:inline-block; color:white; border-color:#FFBF27; padding:7.5px 16px; font-family: SouthwestSans,Arial,Helvetica,sans-serif;"class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
					</div>
			</form>
		</div>
		<div class="alternateLoginDiv">
			<a class="cwaLink" href="{{ route('register') }}">Join Us<i class="fa fa-chevron-right" style="font-size:0.8em;"></i></a>
			<br class="removeBR">
			<a href="/">Home <i class="fa fa-chevron-right" style="font-size:0.8em;"></i></a>
			<br>
		</div>

	</div>
</body>
</html
