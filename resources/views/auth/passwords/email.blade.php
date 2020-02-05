@extends('templates.app_prelogin')

@section('content')
<div class="overlay-bg">
    <div class="container">        
      <div class="col-12 col-md-4 offset-0 offset-md-4 card card-login text-center"><br><br><br><br><br><br><br>
        <div class="container">          
          <h5 class="font-weight-bold">Reset Password </h5><br>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror form-login"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <input type="submit" class="form-control font-weight-bold text-center col-12 col-md-10 btn btn-secondary btn-login" value="Send Password Reset Link">
            </form>
        </div>
      </div>
    </div>
</div>
@endsection