
@extends('layouts.app')

@section('content')
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="../../assets/images/logo.png" alt="...">
        <h2 class="brand-text">Value Monitoring & Benchmarking</h2>
      </div>
      <p>Sign up to Your Account</p>
      <form method="POST" action="{{ route('register') }}" autocomplete="off">
       {{csrf_field()}}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
          <input type="text" class="form-control empty" id="inputName" value="{{ old('name') }}" name="name">
          <label class="floating-label" for="inputName">Name</label>
           @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
           @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
          <input type="email" value="{{ old('email') }}" class="form-control empty" id="inputEmail" name="email">
          <label class="floating-label" for="inputEmail">Email</label>
              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
          <input type="password" class="form-control empty" id="inputPassword" name="password">
          <label class="floating-label" for="inputPassword">Password</label>
            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
          <input type="password" class="form-control empty" id="inputPasswordCheck" name="password_confirmation">
          <label class="floating-label" for="inputPasswordCheck">Retype Password</label>
        </div>
        <button type="submit" class="btn btn-success btn-block waves-effect">Register</button>
      </form>
      <p>Have account already? Please go to <a href="{{url('login')}}">Sign In</a></p>
      @include('partials.login.footer')
    </div>
  </div>
 
@endsection
