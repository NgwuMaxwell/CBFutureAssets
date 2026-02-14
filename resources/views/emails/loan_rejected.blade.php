{{-- blade-formatter-disable --}}
@component('mail::message')



# Loan Application Rejected

Dear {{ $loan->user->name }},

We regret to inform you that your loan application has been rejected.

If you have any questions, please feel free to contact us.

Thank you for using our services.



{{ config('app.name') }}
@endcomponent
