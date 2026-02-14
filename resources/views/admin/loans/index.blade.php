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
                    <h1 class="title1 ">Manage NFTS</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">




                                <div class="container">


                                    <h2>Loan Applications</h2>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Amount ($)</th>
                                                <th>Credit Facility</th>
                                                <th>Duration (Months)</th>
                                                <th>Income ($)</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($loans as $loan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $loan->user->name }} ({{ $loan->user->email }})</td>
                                                    <td>{{$settings->currency}}{{ number_format($loan->amount, 2) }}</td>
                                                    <td>{{ $loan->credit_facility }}</td>
                                                    <td>{{ $loan->duration }}</td>
                                                    <td>{{$settings->currency}}{{ $loan->income }}</td>
                                                    <td>{{ $loan->purpose }}</td>
                                                    <td>
                                                        <span class="badge {{ $loan->status == 'approved' ? 'badge-success' : ($loan->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                            {{ ucfirst($loan->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($loan->status == 'pending')
                                                            <form action="{{ route('loans.approve', $loan->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                            </form>
                                                            <form action="{{ route('loans.reject', $loan->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                            </form>
                                                        @else
                                                            <span class="text-muted">No actions available</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">No loan applications found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
