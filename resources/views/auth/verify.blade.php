@extends('layouts.app')

@section('content')
  <div class="container container__center container__full-screen">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">{{ __('Verify Your Email Address') }}</h2>
      </div>

      <div class="card-body">
        @if (session('resent'))
          <div class="alert alert__success alert-block fixed autodismiss">
            <div class="alert--inner">
              <strong>{{ __('A fresh verification link has been sent to your email address.') }}</strong>
            </div>
          </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
      </div>
  </div>

</div>
@endsection
