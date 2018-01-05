@extends('layouts.auth')
@section('content')
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }} {{ (session('status')) ? 'has-success' : '' }} ">
            <label class="form-control-label" for="email">Email address</label>
            <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }} {{ (session('status')) ? 'form-control-success' : '' }}" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
            @if ($errors->has('email'))
                <div class="form-control-feedback"  >
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
            @if (session('status'))
                <div class="form-control-feedback"  >
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif
          </div>

          <div class="form-group">
              {{-- <div class="col-md-6 col-md-offset-4"> --}}
              @if (session('status'))
                <button type="submit" class="btn btn-primary" disabled>
                    Send Password Reset Link
                </button>
              @else
                <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                </button>
              @endif

              {{-- </div> --}}
          </div>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="/login">Login</a>
      </div>
    </div>
  </div>


{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
