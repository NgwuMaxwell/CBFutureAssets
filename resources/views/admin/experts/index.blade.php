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


                                <h2>Manage Experts</h2>

                                <a href="{{ route('admin.experts.create') }}" class="btn btn-success mb-3">Add New Expert</a>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Win Rate</th>
                                            <th>Profit Share</th>
                                            <th>Min Capital</th>
                                            <th>Total Profit</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($experts as $expert)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/app/public/' . $expert->profile_picture) }}" alt="Profile" width="50"></td>
                                                <td>{{ $expert->name }}</td>
                                                <td>{{ $expert->win_rate }}%</td>
                                                <td>{{ $expert->profit_share_percentage }}%</td>
                                                <td>${{ number_format($expert->min_startup_capital, 2) }}</td>
                                                <td>${{ number_format($expert->total_profit, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.experts.edit', $expert->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('admin.experts.destroy', $expert->id) }}" method="POST" class="d-inline">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this expert?')">Delete</button>
                                                    </form>
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
        </div>




@endsection
