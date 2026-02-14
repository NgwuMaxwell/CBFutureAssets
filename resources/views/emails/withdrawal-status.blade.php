{{-- blade-formatter-disable --}}
@component('mail::message')

# Hello {{$foramin  ? 'Admin' : $user->username}}
@if ($foramin)
This is to inform you that you {{$user->name}} have made a withdrawal request of {{$settings->currency.$withdrawal->amount}}, kindly login to your account to review and take neccesary action.
@else
@if ($withdrawal->status == 'Processed')
Your withdrawal request has been **approved and processed** successfully.

## Withdrawal Details:
- **Amount:** {{$settings->currency.$withdrawal->amount}}
- **Payment Method:** {{ $withdrawal->payment_mode }}
- **Status:** Processed

You should receive your funds shortly.

If you have any questions, feel free to contact our support team.

@else
Your withdrawal request has been submitted successfully.

## Details:
- **Amount:** {{$settings->currency.$withdrawal->amount}}
- **Payment Method:** {{ $withdrawal->payment_mode }}
- **Status:** {{ $withdrawal->status }}

We will process your request shortly.
@endif    
@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent
{{-- blade-formatter-disable --}}

