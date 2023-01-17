@component('mail::message')
# Hi {{ $user['name'] }},

Congratulations, something good has happened!
As your book has already been confirmed, please click on the "Start Consultation" button below at your booked date and time.
Your appointment is as follows:

## Booking Details:
@component('mail::table')
|     |          |
| ------------- |:-------------:|
| Name of Patient      | {{ $booking['user']['name'] }}      |
| Name of Experts      | {{ $booking['counsellor']['name'] }}      |
@if($booking['is_need_translator'])
| Name of Translator      | {{ $booking['translator']['name'] }}      |
@endif
| Time of Appointment      | {{ $booking['due']->timezone('Asia/Jakarta')->format('F j, Y H:i') }} WIB      |
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
