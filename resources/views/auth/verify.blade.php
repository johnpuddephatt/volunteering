@extends('layouts.app')

@section('content')
  <div class="container container__center container__full-height">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">You’re almost there&hellip;</h2>
      </div>

      <div class="card-body">
        @if (session('resent'))
          <div class="alert--wrapper fixed autodismiss">
            <div class="alert alert__success">
              <strong>A new verification link has been sent to your email address.</strong>
            </div>
          </div>
        @endif

        @if(!Auth::User()->email_verified_at)
          <div class="verification-item">
            <h2>Your email address needs verifying</h2>
            <p>First, check your email (including your junk folder) for a verification link.</p>
            <p>This link is valid for 72 hours. If you can’t find it, or the link has expired you can request another using the link below.</p>
            <a class="button" href="{{ route('verification.resend') }}">Request another verification link</a>
          </div>
        @endif

        @if(!Auth::User()->active)
          <div class="verification-item">
            <h2>Your account needs activating</h2>
            <p>To ensure this website is only used for its intended purpose, accounts are manually approved by an Administrator.</p>
            <p>We’ll send you an email when your account has been activated. If you’ve been waiting more than a couple of days and your account hasn’t been activated, <a href="mailto:info@volunteerwakefield.org">send us an email</a>.</p>
          </div>
        @endif

      </div>
  </div>

</div>
@endsection
