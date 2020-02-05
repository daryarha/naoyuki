@extends('templates.app_prelogin')

@section('content')
  <div class="overlay-bg">
    <div class="container">
      <div class="col-12 col-md-4 offset-0 offset-md-4 card card-login text-center"><br><br><br><br><br><br><br>
        <div class="container">          
          <h5 class="font-weight-bold">Naoyuki Academic Center </h5><br>     
          <form class="user" method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror form-login"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-login" name="password" required autocomplete="current-password" placeholder="Password">              
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <br>
            <input type="submit" class="form-control font-weight-bold text-center col-12 col-md-6 btn btn-secondary btn-login" value="Login">
            <br>            
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="nav-link  nav-forgot text-white text-right">Forgot password</a>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection
