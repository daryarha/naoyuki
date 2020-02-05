@extends('templates.app')
@section('header')
Profil
@endsection
@section('content')
<div class="row">
	<div class="card col-6">
		<div class="card-body">			   
            <form method="POST" action="{{ url('editprofil') }}">
                @csrf  
		        <div class="form-group">
		        	<label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus placeholder="Name" value="{{$profil->name}}">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
		        	<label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" placeholder="Email" value="{{$profil->email}}">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
		        	<label for="role">Position</label>
                  <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                    <option selected disabled>Select your position</option>
                    <option value="1" @if($profil->role==1) selected @endif>Direktur</option>
                    <option value="2" @if($profil->role==2) selected @endif>Marketing</option>
                    <option value="3" @if($profil->role==3) selected @endif>Staff Rekrutmen</option>
                    <option value="4" @if($profil->role==4) selected @endif>Akuntan</option>
                  </select>              
                  @error('role')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
		        	<label for="password">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">              
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <br>
                <div class="row">                	
	                <a class="form-control font-weight-bold text-center col-12 col-md-4  offset-md-1 btn btn-secondary" href="{{ url('dashboard') }}">Cancel</a>
	                <input type="submit" class="form-control font-weight-bold text-center col-12 col-md-4 offset-md-1 btn color-naoyuki" value="Save change">
                </div>
                <br>           
              </form>
		</div>
	</div>
</div>
@endsection