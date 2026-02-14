@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content  ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Manage clients deposits</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">

                    <div class="col-12 card shadow p-4 ">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Client name</th>
                                        <th>Client email</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Date created</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposits as $deposit)
    <tr>
        <td>{{ optional($deposit->duser)->name ?? 'N/A' }}</td>
        <td>{{ optional($deposit->duser)->email ?? 'N/A' }}</td>
        <td>{{ $settings->currency }}{{ number_format($deposit->amount ?? 0, 2) }}</td>
        <td>{{ $deposit->payment_mode ?? 'N/A' }}</td>
        <td>
            @if ($deposit->status == 'Processed')
                <span class="badge badge-success">{{ $deposit->status }}</span>
            @else
                <span class="badge badge-danger">{{ $deposit->status }}</span>
            @endif
        </td>
        <td>{{ $deposit->created_at ? $deposit->created_at->toDayDateTimeString() : 'N/A' }}</td>
        <td>
            <a href="{{ route('viewdepositimage', $deposit->id) }}" class="btn btn-info btn-sm m-1" title="View payment screenshot">
                <i class="fa fa-eye"></i>
            </a>
            <a href="{{ url('admin/dashboard/deldeposit', $deposit->id) }}" class="m-1 btn btn-danger btn-sm">Delete</a>

            @if ($deposit->status != 'Processed')
                <a class="btn btn-primary btn-sm" href="{{ url('admin/dashboard/pdeposit', $deposit->id) }}">Process</a>
            @endif
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
