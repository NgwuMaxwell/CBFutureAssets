@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content  ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Manage clients Trades</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">

                    <div class="col-12 card shadow p-4 ">
                        <div class="table-responsive" data-example-id="hoverable-table">
<table class="table table-hover ">

        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Asset</th>
                <th>Action</th>
                <th>Amount</th>
                <th>Leverage</th>
                <th>Status</th>
                <th>Trade Result</th>
                <th>Profit/Loss</th>
                <th>Opened At</th>
                <th>Expires At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trades as $trade)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trade->user->name ?? 'N/A' }}</td>
                    <td>{{ $trade->asset_name }}</td>
                    <td>{{ ucfirst($trade->action) }}</td>
                    <td>${{ number_format($trade->amount, 2) }}</td>
                    <td>{{ $trade->leverage }}x</td>
                    <td>{{ ucfirst($trade->status) }}</td>
                    <td>
                        @if($trade->result=='PENDING')
                        <span class="badge badge-warning">PENDING</span>

                        @else

                            <span class="badge {{ $trade->result == 'WIN' ? 'badge-success' : 'badge-danger' }}">
                                {{ $trade->result }}
                            </span>
                        @endif
                    </td>

                    <td>
                        @if($trade->profit_loss !== null)
                            {{ $trade->profit_loss >= 0 ? '+' : '-' }}${{ number_format(abs($trade->profit_loss), 2) }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ date('Y-m-d H:i', strtotime($trade->created_at)) }}</td>
        <td>{{ date('Y-m-d H:i', strtotime($trade->expires_at)) }}</td>

        <td>
            <a href="{{ route('admin.trades.show', $trade->id) }}" class="btn btn-sm btn-info">trade</a>
            <a href="{{ route('admin.trades.edit', $trade->id) }}" class="btn btn-sm btn-warning">Edit</a>
        </td>


            @empty
                <tr>
                    <td colspan="11">No trades found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $trades->links() }}
</div>



</div>
</div>
</div>
</div>
@endsection

