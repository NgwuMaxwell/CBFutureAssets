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

<div class="container">
    <h2>Trade Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>User</th>
            <td>{{ $trade->user->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Asset</th>
            <td>{{ $trade->asset_name }}</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>{{ ucfirst($trade->action) }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>${{ number_format($trade->amount, 2) }}</td>
        </tr>
        <tr>
            <th>Leverage</th>
            <td>{{ $trade->leverage }}x</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($trade->status) }}</td>
        </tr>
        <tr>
            <th>Profit/Loss</th>
            <td>
                @if($trade->profit_loss !== null)
                    {{ $trade->profit_loss >= 0 ? '+' : '-' }}${{ number_format(abs($trade->profit_loss), 2) }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>Opened At</th>
            <td>{{ $trade->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        <tr>
            <th>Expires At</th>
            <td>{{ $trade->expires_at->format('Y-m-d H:i') }}</td>
        </tr>
    </table>

    @if($trade->status === 'open')
        <form action="{{ route('admin.trades.updateProfitLoss', $trade->id) }}" method="POST">
            @csrf
            <div class="form-group">
            <label>Assign Profit/Loss to Trade</label>
            <select name="result"  class="form-control"required>

                <option value="">Select</option>
                <option value="WIN">WIN</option>
                <option value="LOSS">LOSS</option>
            </select>
        </div>
            <div class="form-group">
                <label>Assign Profit/Loss (USD)</label>
                <input type="number" step="0.01" name="profit_loss" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profit/Loss</button>
        </form>
    @endif

</div>


                    </div>
                </div>
            </div>
        </div>
    @endsection
