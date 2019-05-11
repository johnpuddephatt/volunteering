@component('mail::message')

A new account has been created and is awaiting activation.

@component('mail::table')
|               |               |
| ------------- | ------------- |
| **Organisation name**&nbsp;&nbsp; | {{ $organisation->name}} |
| **Contact name**&nbsp;&nbsp;      | {{ $organisation->contact_name}} |
| **Contact email**&nbsp;&nbsp;     | {{ $organisation->email}} |
| **Contact phone**&nbsp;&nbsp;     | {{ $organisation->phone}} |
| **Organisation info**&nbsp;&nbsp; | {{ str_limit($organisation->info, $limit = 35, $end = '...') }} |
@endcomponent

@component('mail::button', ['url' => url('admin/organisation/'.$organisation->id.'/activate') ])

Activate this account

@endcomponent

@endcomponent
