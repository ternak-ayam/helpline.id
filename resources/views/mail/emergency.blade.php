@component('mail::message')
Please see the patient record below

@component('mail::button', ['url' => $actionUrl, 'color' => 'error'])
{{ $actionText }}
@endcomponent

Thank you,
<br>
Support Team {{ config('app.name') }}
@endcomponent