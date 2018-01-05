@extends('layouts.auth')
@section('content')
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {!! csrf_field() !!}
        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
          <label class="form-control-label" for="email">Email address</label>
          <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
          @if ($errors->has('email'))
              <div class="form-control-feedback"  >
                  <strong>{{ $errors->first('email') }}</strong>
              </div>
          @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-danger' : ' ' }}">
          <label class="form-control-label" for="password">Password</label>
          <input type="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" name="password" id="password" placeholder="Password">
          @if ($errors->has('password'))
              <div class="form-control-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
              </div>
          @endif
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
            </div>
        </div>

        <input type="submit" class="btn btn-primary btn-block" value="Login">
      </form>
      <div class="text-center">
        {{-- <a class="d-block small mt-3" href="/dashboard/register">Register an Account</a> --}}
        <a class="d-block small" href="/password/reset">Forgot Password?</a>
      </div>
    </div>
  </div>
@endsection
