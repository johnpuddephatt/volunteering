@component('mail::message')

## Hello {{ $organisation->contact_name }},

@if($organisation->email_verified_at)
Your account has been activated. That means you're ready to start posting opportunities.

@component('mail::button', ['url' => url('dashboard') ])

Start posting opportunities

@endcomponent

@else

Your account has been activated, but you still need to verify your email address before you can post opportunities.

Either click on the verify link within the email we've sent you, or head to the verification page to resend the email.

@component('mail::button', ['url' => url('email/verify') ])

Resend your verification email

@endcomponent


@endif



@endcomponent
