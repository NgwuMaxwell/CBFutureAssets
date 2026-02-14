@component('mail::message')
# New Trade Placed for You 📈

Dear {{ $trade->user->name }},

A new trade has been placed for you by the system.

- **Asset:** {{ $trade->asset_name }}
- **Amount:** {{$settings->currency}}{{ number_format($trade->amount, 2) }}
- **Leverage:** {{ $trade->leverage }}x
- **Trade Action:** {{ ucfirst($trade->action) }}
- **Take Profit:** {{ $trade->take_profit ?? 'Not Set' }}
- **Stop Loss:** {{ $trade->stop_loss ?? 'Not Set' }}
- **Expires At:** {{ \Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i') }}

@component('mail::button', ['url' => route('user.trades.history')])
View Trade History
@endcomponent

If you have any questions, feel free to contact support.

Thanks for trading with us!
**{{ config('app.name') }} Team**
@endcomponent
