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
                    <h1 class="title1 ">Manage Signal Plans</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">


                                <div class="container">
                                    <h2>Signal Plans</h2>
                                    <a href="{{ route('signal-plans.create') }}" class="btn btn-primary mb-3">Create New Plan</a>

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price ($)</th>
                                                <th>Duration (Months)</th>
                                                  <th>Features</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($plans as $plan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $plan->name }}</td>
                                                    <td>${{ number_format($plan->price, 2) }}</td>
                                                    <td>{{ $plan->duration }} Week(s)</td>
                                                        <td>{{ $plan->features }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ route('signal-plans.edit', $plan->id) }}" class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('signal-plans.destroy', $plan->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="5">No signal plans found.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $plans->links() }}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endsection
