@component('mail::message')
# Congratulations, {{ $client->name }},

We have booked your event. Here is details about the booking:

@component('mail::table')
| Event Details         |                                       |
| --------------------- | ------------------------------------- |
| Event Date            | {{ $booking->date }}                  |
| Event Time            | {{ ucfirst($booking->duration) }}     |
| Event Type            | {{ $booking->eventType->name }}       |
| No of guests          | {{ $booking->guest_count }}           |
@endcomponent

@component('mail::table')
| Payment Details       |                                       |
| --------------------- | ------------------------------------- |
| Total Amount          | {{ $booking->subtotal_amount }} TK    |
| Discount Amount       | {{ $booking->discount }} TK           |
| Amount needs to pay   | {{ $booking->total_amount }} TK       |
| Paid Amount           | {{ $booking->paid_amount }} TK        |
| Due Amount            | {{ $booking->due_amount }} TK         |
@endcomponent

Thanks,<br>
{{ $communityCenter->name }},<br/>
*Powered by {{ config('app.name') }}*
@endcomponent
