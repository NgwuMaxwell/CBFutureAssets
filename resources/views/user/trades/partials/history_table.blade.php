
                    <div class="table-responsive">
<table class="table table-light table-hover text-dark">
    <thead class="thead-light text-dark">
        <tr>
            <th>#</th>
                                <th><b>Asset</b></th>
                                <th><b>Action</b></th>
                                <th><b>Amount</b></th>
                                <th><b>Leverage</b></th>
                                <th><b>Status</b></th>
                                <th><b>Result</b></th>
                                <th><b>Profit/Loss</b></th>
                                <th><b>Opened At</b></th>
                                <th><b>Expires At</b></th>
                                <th><b>Time Left</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($trades as $trade)
            <tr data-trade-id="{{ $trade->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trade->asset_name }}</td>
                <td class="text-uppercase">{{ ucfirst($trade->action) }}</td>
                <td>${{ number_format($trade->amount, 2) }}</td>
                <td>{{ $trade->leverage }}x</td>
                <td class="trade-status">
                    <span class="badge {{ $trade->status == 'open' ? 'badge-primary' : 'badge-secondary' }}">
                        {{ ucfirst($trade->status) }}
                    </span>
                </td>
                <td class="trade-result">
                    @if($trade->result == 'PENDING')
                        <span class="badge bg-warning text-dark">PENDING</span>
                    @else
                        <span class="badge {{ $trade->result == 'WIN' ? 'bg-success' : 'bg-danger' }}">
                            {{ $trade->result }}
                        </span>
                    @endif
                </td>
                <td class="trade-profit">
                    @if($trade->profit_loss !== null)
                        <span class="{{ $trade->profit_loss >= 0 ? 'text-success' : 'text-danger' }}">
                            {{ $trade->profit_loss >= 0 ? '+' : '-' }}${{ number_format(abs($trade->profit_loss), 2) }}
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i') }}</td>
                <td class="countdown-timer font-weight-bold text-danger" data-expiry="{{ \Carbon\Carbon::parse($trade->expires_at)->timestamp }}"></td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="text-center text-muted">No trades found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>


@endsection
