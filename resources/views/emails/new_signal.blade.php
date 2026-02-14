# New Trading Signal Alert

**Signal Name:** {{ $signal->name }}
**Entry Price:** {{ $signal->entry_price }}
**Take Profit:** {{ $signal->take_profit }}
**Stop Loss:** {{ $signal->stop_loss }}
**Leverage:** {{ $signal->leverage }}x

@component('mail::button', ['url' => url('/dashboard/singalssubscriptions')])
View Signals
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
