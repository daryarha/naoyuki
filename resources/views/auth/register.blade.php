@extends('templates.app_prelogin')

@section('content')
  <div class="overlay-bg">
    <div class="container">
      <div class="col-12 col-md-4 offset-0 offset-md-4 card card-login text-center"><br><br><br><br><br><br><br>
        <div class="container">          
          <h5 class="font-weight-bold">Register</h5><br>     
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror form-login"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror form-login"  value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-login" name="password" required autocomplete="new-password" placeholder="Password">              
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password-confirm" type="password" class="form-control form-login" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <select id="role" class="form-control @error('role') is-invalid @enderror form-login" name="role" required>
                    <option selected disabled>Select your position</option>
                    <option value="1">Direktur</option>
                    <option value="2">Marketing</option>
                    <option value="3">Staff Rekrutmen</option>
                    <option value="4">Akuntan</option>
                  </select>              
                  @error('role')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <br>
                <input type="submit" class="form-control font-weight-bold text-center col-12 col-md-6 btn btn-secondary btn-login" value="Register">
                <br>           
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
