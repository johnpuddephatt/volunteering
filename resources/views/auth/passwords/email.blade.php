@extends('layouts.app')

@section('content')
<div class="container container__full-height container__center">
  <div class="card">
      <div class="card-header">
        <h2 class="card-title">Reset Password</h2>
      </div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-group row">
                  <label for="email">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="text-danger" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
