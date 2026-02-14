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
                    <h1 class="title1 ">Clients Signals</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">



                                <div class="container">
                                    <h2>Signal Plans</h2>
                                    <a href="{{ route('signal.create') }}" class="btn btn-primary mb-3">Create New Signal Plan</a>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Entry Price</th>
                                                <th>Take Profit</th>
                                                <th>Stop Loss</th>
                                                <th>Leverage</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($signals as $signal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $signal->name }}</td>
                                                <td>{{ $signal->entry_price }}</td>
                                                <td>{{ $signal->take_profit }}</td>
                                                <td>{{ $signal->stop_loss }}</td>
                                                <td>{{ $signal->leverage }}x</td>
                                                <td>{{ ucfirst($signal->status) }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('signal.edit', $signal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                    <!-- Delete Form -->
                                                    <form action="{{ route('signal.destroy', $signal->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
        </div>




    @endsection
