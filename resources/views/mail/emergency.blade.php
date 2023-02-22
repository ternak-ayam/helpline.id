@component('mail::message')
Please check patient record below

@component('mail::button', ['url' => $actionUrl, 'color' => 'error'])
{{ $actionText }}
@endcomponent

Thank you for your support

Regards,<br>
{{ config('app.name') }}
@endcomponent