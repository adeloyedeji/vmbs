@extends('layouts.app')

@section('content')
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="../../assets//images/logo.png" alt="...">
        <h2 class="brand-text">VMB</h2>
      </div>
      <p>Sign into your account</p>
      <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
        
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
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline checkbox-primary pull-xs-left">
            <input type="checkbox" id="inputCheckbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="inputCheckbox">Remember me</label>
          </div>
          <a class="pull-xs-right" href="{{ route('password.request') }}">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
      </form>
      <p>Still no account? Please go to <a href="{{url('register')}}">Register</a></p>
       @include('partials.login.footer')
    </div>
  </div>
 
@endsection
