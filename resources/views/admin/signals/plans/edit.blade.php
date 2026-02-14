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
                    <h1 class="title1 ">Edit Signal Plan</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">


                                <div class="container">
                                    <h2>Edit Signal Plan</h2>

                                    <form action="{{ route('signal-plans.update', $signalPlan->id) }}" method="POST">
                                        @csrf @method('PUT')

                                        <div class="form-group">
                                            <label>Plan Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $signalPlan->name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Price ($)</label>
                                            <input type="number" name="price" class="form-control" value="{{ $signalPlan->price }}" required>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Features</label>
                                            <input type="text" name="features" class="form-control" value="{{ $signalPlan->features }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Duration (Weeks)</label>
                                            <input type="text" name="duration" class="form-control" value="{{ $signalPlan->duration }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Plan</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endsection
