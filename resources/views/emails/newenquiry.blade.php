@component('mail::message')

## Enquiry about “{{ $enquiry->enquirable->title }}”

**{{ $enquiry->enquirable->organisation->name }}** has received new volunteer interest.

@component('mail::table')
|               |               |
| ------------- | ------------- |
| **Name**&nbsp;&nbsp; | {{ $enquiry->name }} |
| **Phone**&nbsp;&nbsp;      | {{ $enquiry->phone }} |
| **Contact email**&nbsp;&nbsp;     | {{ $enquiry->email}} |
@endcomponent

@component('mail::panel')
{{ $enquiry->message }}
@endcomponent

@component('mail::button', ['url' => 'mailto:' . $enquiry->email ])

Reply to {{ $enquiry->name}}

@endcomponent

@endcomponent
