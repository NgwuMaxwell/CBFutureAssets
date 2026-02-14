{{-- blade-formatter-disable --}}
@component('mail::message')


# Loan Application Approved

Dear {{ $loan->user->name }},

We are pleased to inform you that your loan application has been approved.

The amount of {{$settings->currency}}{{ $loan->amount }} has been credited to your account.

If you have any questions, please feel free to contact us.

Thank you for using our services.


{{ config('app.name') }}
@endcomponent
