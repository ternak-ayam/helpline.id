@component('mail::message')
# Hi Anonim,

Congratulations, something good has happened!
As your book has already been confirmed, you will receive the notification once your
scheduled consulting time is approved at 1x 24 hour after you received this email.
Your appointment as follows:

## Booking Details:
@component('mail::table')
|     |          |
| ------------- |:-------------:|
| Name of Experts      | {{ $booking['counsellor']['name'] }}      |
@if(! blank($booking['user']['timezone']))
| Time of Appointment      | {{ $booking['due']->timezone($booking['user']['timezone'])->format('F j, Y H:i') }}      |
@else
| Time of Appointment      | {{ $booking['due']->format('F j, Y H:i') }} UTC      |
@endif
| Type of Consultation      | {{ Str::replace('-', ' ', $booking['counselling_method']) }}      |
| Book Via      | Website      |
@endcomponent

@component('mail::subcopy')
To start consultation you can click this link
@endcomponent

@component('mail::button', ['url' => $actionUrl, 'color' => 'error'])
{{ $actionText }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
