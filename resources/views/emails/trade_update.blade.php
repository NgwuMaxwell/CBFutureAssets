@component('mail::message')
# Trade Update Notification 📢

Dear {{ $trade->user->name }},

Your trade for **{{ $trade->asset_name }}** has been updated.

- **Trade Result:** {{ $trade->result }}
- **Profit/Loss:** {{ $trade->profit_loss >= 0 ? '+' : '-' }}{{$settings->currency}}{{ number_format(abs($trade->profit_loss), 2) }}
- **Status:** {{ ucfirst($trade->status) }}

@component('mail::button', ['url' => route('user.trades.history')])
View Trade History
@endcomponent

If you have any questions, feel free to contact support.

Thanks for trading with us!
**{{ config('app.name') }} Team**
@endcomponent
