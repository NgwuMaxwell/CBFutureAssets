{{-- blade-formatter-disable --}}
@component('mail::message')
# Hello {{ $user->username }},

Your trade has been successfully executed.

## Trade Details

- **Asset:** {{ $trade->asset_name }}
- **Type:** {{ ucfirst($trade->asset_type) }}
- **Action:** {{ ucfirst($trade->action) }}
- **Leverage:** {{ $trade->leverage }}x
- **Take Profit:** {{ $settings->currency }}{{ $trade->take_profit }}
- **Stop Loss:** {{ $settings->currency }}{{ $trade->stop_loss }}
- **Amount:** {{ $settings->currency }}{{ number_format($trade->amount, 2) }}

You can view your trade history anytime in your account.

Thanks,  
**{{ config('app.name') }}**
@endcomponent
