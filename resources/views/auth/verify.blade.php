@extends('layouts.app')

@section('content')
  <div class="container container__center container__full-screen">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">{{ __('Your account needs verifying') }}</h2>
      </div>

      <div class="card-body">
        @if (session('resent'))
          <div class="alert alert__success alert-block fixed autodismiss">
            <div class="alert--inner">
              <strong>{{ __('A fresh verification link has been sent to your email address.') }}</strong>
            </div>
          </div>
        @endif

        <h2>ONE. Verify your email address</h2>
        @if(Auth::User()->email_verified_at)
          TICK! Your email is verified
        @else
          <p>Your email address is not verified.
          <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
          <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
        @endif

        <h2>TWO. Wait for your account to be approved</h2>
        @if(Auth::User()->active)
          TICK! Your account is activated
        @else
          <p><strong>Not approved</strong></p>
          <p>To ensure this website is only used for its intended purpose, accounts must by manually approved by Nova Wakefield.</p>
          <p>Please allow up to two working days for this to happen.</p>
        @endif

      </div>
  </div>

</div>
@endsection
