{{-- blade-formatter-disable --}}
@component('mail::message')
# Hello {{$foramin  ? 'Admin' : $user->username}}
@if ($foramin)
 This is to inform you of a successfull Deposit of {{$settings->currency.$deposit->amount}} from {{$user->name}}. {{ $deposit->status == "Processed" ? '' : ' Please login to process it.' }}
@else
@if ($deposit->status == 'Processed')
Your deposit of **{{$settings->currency.$deposit->amount}}** has been successfully **processed and confirmed**.

## **Deposit Details**
- **Amount:** {{$settings->currency.$deposit->amount}}
- **Payment Method:** {{ $deposit->payment_mode }}
- **Status:** ✅ Confirmed
- **Account Balance:** {{$settings->currency.$user->account_bal }}

You can now use these funds for transactions.


@else
Your deposit request has been received successfully. We will process it shortly.

## Deposit Details:
- **Amount:** {{$settings->currency.$deposit->amount}}
- **Payment Method:** {{ $deposit->payment_mode }}
- **Status:** Pending

You will receive a confirmation once it's approved.
@endif
@endif
Thank you for using **{{ config('app.name') }}**.
<br>
{{ config('app.name') }}
@endcomponent
{{-- blade-formatter-disable --}}
