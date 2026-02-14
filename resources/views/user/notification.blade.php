<h4>Notifications</h4>
<ul>
    @forelse(auth()->user()->notifications as $notification)
        <li>
            Trade on {{ $notification->data['asset'] }} closed with result:
            <strong>{{ $notification->data['result'] }}</strong>
            (Profit/Loss: ${{ number_format($notification->data['profit_loss'], 2) }})
        </li>
    @empty
        <li>No notifications.</li>
    @endforelse
</ul>
