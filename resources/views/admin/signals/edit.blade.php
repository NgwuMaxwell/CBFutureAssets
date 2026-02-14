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
                                    <h2>Edit Signal</h2>
                                    <!-- edit.blade.php -->

<form action="{{ route('signal.update', $signal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Signal Name</label>
        <input type="text" class="form-control" name="name" value="{{ $signal->name }}" required>
    </div>

    <div class="form-group">
        <label for="entry_price">Entry Price</label>
        <input type="number" class="form-control" name="entry_price" value="{{ $signal->entry_price }}" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="take_profit">Take Profit</label>
        <input type="number" class="form-control" name="take_profit" value="{{ $signal->take_profit }}" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="stop_loss">Stop Loss</label>
        <input type="number" class="form-control" name="stop_loss" value="{{ $signal->stop_loss }}" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="leverage">Leverage</label>
        <input type="number" class="form-control" name="leverage" value="{{ $signal->leverage }}" required>
    </div>
    <div class="form-group mb-3">
    <label for="status">Status</label>
    <select class="form-control" name="status" required>
        <option value="active" {{ $signal->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="closed" {{ $signal->status == 'closed' ? 'selected' : '' }}>Expired</option>
    </select>
</div>

    <input type="hidden" class="form-control" name="id" value="{{ $signal->id}}" required>
    <button type="submit" class="btn btn-success">Update Signal</button>
</form>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endsection
