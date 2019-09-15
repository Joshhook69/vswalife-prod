@extends('master')

@section('content')
	<div class="container" style="margin-top:10%; background-image: url('/assets/images/registration-logo.jpg'); background-size: cover;
	background-repeat: no-repeat; background-size:cover;">
		<h1 class="display-4" style="text-align:center;  margin-right:10%; margin-top:5%;">Register</h1>
        <form method="POST" action="{{ route('register') }}">
        	@csrf

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input style="opacity:.69;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
        		<span class="invalid-feedback" role="alert">
        			<strong>{{ $message }}</strong>
        		</span>
        	@enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input style="opacity:.69;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                	<strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
    			<label for="password">{{ __('Password') }}</label>
    			<input style="opacity:.69;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    			@error('password')
    			<span class="invalid-feedback" role="alert">
    				<strong>{{ $message }}</strong>
    			</span>
    			@enderror
  			</div>

  			<div class="form-group">
    			<label for="password-confirm">{{ __('Confirm Password') }}</label>
    			<input style="opacity:.69;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  			</div>
  			 <div class="form-group">
                <label for="vatsim_cid">{{ __('Vatsim CID') }}</label>
                <input style="opacity:.69;" id="vatsim_cid" type="text" class="form-control @error('CID') is-invalid @enderror" name="vatsim_cid" value="{{ old('CID') }}" required autocomplete="vatsim_cid" autofocus>
            @error('Vatsim CID')
        		<span class="invalid-feedback" role="alert">
        			<strong>{{ $message }}</strong>
        		</span>
        	@enderror
            </div>
  			<div class="form-row align-items-center">
  			<div class="col-auto my-1" style="display: inline-block;">
      		<label class="mr-sm-2" for="crew_base" value="crew_base">Crew Base Preference</label>
      		<select style="opacity:.75;"class="custom-select mr-sm-2" id="crew_base" value="crew_base" name="crew_base">
       	    <option selected>Choose...</option>
            <option value="DAL" id="crew_base" name="crew_base">DAL</option>
            <option value="HOU" id="crew_base" name="crew_base">HOU</option>
            <option value="PHX" id="crew_base" name="crew_base">PHX</option>
            <option value="MDW" id="crew_base" name="crew_base">MDW</option>
            <option value="BWI" id="crew_base" name="crew_base">BWI</option>
            <option value="DEN" id="crew_base" name="crew_base">DEN</option>
            <option value="ATL" id="crew_base" name="crew_base">ATL</option>
            <option value="OAK" id="crew_base" name="crew_base">OAK</option>
            <option value="MCO" id="crew_base" name="crew_base">MCO</option>
            <option value="LAS" id="crew_base" name="crew_base">LAS</option>
            <option value="LAX" id="crew_base" name="crew_base">LAX</option>
            </select>
            <button type="submit" style="margin-left:292%; margin-top:-13%;" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
            </div>
        </form>
    </div>
@endsection
