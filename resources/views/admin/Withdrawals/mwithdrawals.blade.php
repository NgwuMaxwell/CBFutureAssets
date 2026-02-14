<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Manage clients withdrawals</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">
                                <table id="ShipTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Client name</th>
                                            <th>Amount requested</th>
                                            <th>Amount + charges</th>
                                            <th>Payment Method</th>
                                            <th>Receiver's email</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdrawals as $deposit)
                                            <tr>
                                                <td>{{ optional($deposit->duser)->name ?? 'N/A' }}</td>
                                                <td>{{ $settings->currency }}{{ number_format($deposit->amount ?? 0, 2) }}</td>
                                                <td>{{ $settings->currency }}{{ number_format($deposit->to_deduct ?? 0, 2) }}</td>
                                                <td>{{ $deposit->payment_mode ?? 'N/A' }}</td>
                                                <td>{{ optional($deposit->duser)->email ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($deposit->status == 'Processed')
                                                        <span class="badge badge-success">{{ $deposit->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $deposit->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $deposit->created_at ? \Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString() : 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('processwithdraw', $deposit->id) }}" class="m-1 btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
