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
            <p>First, check your email for a verification link. If you can’t find it, or didn’t receive it, you can <a href="{{ route('verification.resend') }}">click here to request another</a>.</p>
          </div>
        @endif

        @if(!Auth::User()->active)
          <div class="verification-item">
            <h2>Your account needs activating</h2>
            <p>To ensure this website is only used for its intended purpose, accounts are manually approved by an Administrator.</p>
            <p>We’ll send you an email when your account has been activated.</p>
          </div>
        @endif

      </div>
  </div>

</div>
@endsection
