@extends('layouts.app')

@section('content')
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="../../assets/images/logo.png" alt="...">
        <h2 class="brand-text">VMB</h2>
      </div>
      <p> 
       @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    </p>
      <form method="POST" action="{{ route('password.email') }}">
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
       
        <button type="submit" class="btn btn-success btn-block"> Send Password Reset Link</button>
      </form>
      <p>Still no account? Please go to <a href="{{url('register')}}">Register</a></p>
      @include('partials.login.footer')
    </div>
  </div>
 
@endsection

