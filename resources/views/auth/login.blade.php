@extends('layouts.app')

@section('content')
  <div class="background-image--wrapper">
    <img src="/images/login-image.jpg" class="background-image">
  </div>

  <div class="login-wrapper">
    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
        <h2 class="login-form--title">Sign in or register to add your opportunities</h2>

        <div class="login-form--body">
          <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <div class="col-md-6">
              <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="login-form--extras">
          <div class="form-group">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
              {{ __('Remember Me') }}
            </label>
          </div>

          <div class="form-group">
            @if (Route::has('password.request'))
              <a class="button button__text" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            @endif
          </div>
        </div>

        <div class="login-form--buttons">
          <button type="submit">
            {{ __('Sign in') }}
          </button>

          <button class="button__ghost" formaction="{{ route('registration')}}" type="submit">
            {{ __('Register') }}
          </button>
        </div>

      </div>
    </form>
  </div>
@endsection
