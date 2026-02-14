@component('mail::message')
# Hello {{ $user->name }}

Your loan request has been received and is currently under review.

### Loan Details:
- **Amount:** {{$settings->currency.number_format($loan->amount, 2)}}
- **Credit Facility:** {{ $loan->credit_facility }}
- **Duration:** {{ $loan->duration }} months
- **Purpose:** {{ $loan->purpose }}

We will notify you once a decision has been made.

Thank you for choosing us!

{{ config('app.name') }}
@endcomponent
