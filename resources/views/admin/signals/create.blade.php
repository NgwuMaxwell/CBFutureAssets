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




                                <div class="container">
                                    <h2>Create Signal</h2>
                                    <form action="{{ route('signal.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Signal Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="entry_price">Entry Price</label>
                                            <input type="number" class="form-control" name="entry_price" step="0.01" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="take_profit">Take Profit</label>
                                            <input type="number" class="form-control" name="take_profit" step="0.01" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stop_loss">Stop Loss</label>
                                            <input type="number" class="form-control" name="stop_loss" step="0.01" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="leverage">Leverage</label>
                                            <input type="number" class="form-control" name="leverage" required>
                                        </div>
                                          <div class="form-group mb-2">
                                       <select class="form-control" name="status" required>
    <option value="active" selected>Active</option>
    <option value="closed">closed</option>
</select>
</div>

                                        <button type="submit" class="btn btn-primary">Create Signal</button>
                                    </form>
                                </div>









                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endsection
