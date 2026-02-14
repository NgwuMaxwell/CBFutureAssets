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
                <x-error-alert />
                <div class="mb-5 row">

                    <div class="col-12 card shadow p-4 ">



<div class="container">
    <h2>Edit Trade</h2>

    <form action="{{ route('admin.trades.update', $trade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $trade->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">

            <label>Asset Type</label>
                                    <select name="asset_type"  id="asset_type" class="form-control" required>

                                        <option value="crypto">Crypto</option>
                                        <option value="stock">Stock</option>
                                        <option value="forex">Forex</option>
                                    </select>
        </div>

        <div class="mb-3">
            <label>Asset Name</label>
            <input type="text" name="asset_name" class="form-control" value="{{ $trade->asset_name }}" required>
        </div>

        <div class="mb-3">
            <label>Action</label>
            <select name="action" class="form-control">
                <option value="buy" {{ $trade->action == 'buy' ? 'selected' : '' }}>Buy</option>
                <option value="sell" {{ $trade->action == 'sell' ? 'selected' : '' }}>Sell</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $trade->amount }}" required>
        </div>

        <div class="mb-3">
            <label>Leverage</label>
            <input type="number" name="leverage" class="form-control" value="{{ $trade->leverage }}" required>
        </div>

        <div class="mb-3">
            <label>Duration (in minutes)</label>
            <input type="number" name="duration" class="form-control" value="{{ $trade->duration }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="open" {{ $trade->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ $trade->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Result</label>
            <select name="result" class="form-control">
                <option value="PENDING" {{ $trade->result == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                <option value="WIN" {{ $trade->result == 'WIN' ? 'selected' : '' }}>WIN</option>
                <option value="LOSS" {{ $trade->result == 'LOSS' ? 'selected' : '' }}>LOSS</option>
            </select>
        </div>


        <div class="mb-3">
            <label>Profit/Loss (Optional)</label>
            <input type="number" step="0.01" name="profit_loss" class="form-control" value="{{ $trade->profit_loss }}">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Trade</button>
        </div>
    </form>





                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
