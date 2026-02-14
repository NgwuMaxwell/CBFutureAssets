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
                    <h1 class="title1 ">Create New NFTS</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">



                                <div class="container mt-4">
                                    <h2>Create Signal Plan</h2>
                                    <div class="card p-4">
                                        <form action="{{ route('signal-plans.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Plan Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price ($)</label>
                                                <input type="number" name="price" class="form-control" required>
                                            </div>
                                              <div class="form-group">
                                            <label>Features</label>
                                            <input type="text" name="features" class="form-control" value="" required>
                                        </div>
                                            <div class="form-group">
                                                <label for="duration">Duration (Weeks)</label>
                                                <input type="number" name="duration" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create Plan</button>
                                        </form>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endsection
