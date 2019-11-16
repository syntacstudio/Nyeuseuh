@extends('layouts.account')
@section('title', 'Customer Dashboard')

@section('content')
    <div class="summary">
        <h4>Summary</h4>
        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="d-flex bg-success justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $user->orders()->where('status', 'completed')->count() }} Order</span>
                        <p class="mb-0 text-black-50">Completed</p>
                    </span>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="d-flex bg-primary justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $user->orders()->where('status', 'paid')->count() }} Order</span>
                        <p class="mb-0 text-black-50">Paid</p>
                    </span>
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="d-flex bg-danger justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $user->orders()->where('status', 'unpaid')->count() }} Order</span>
                        <p class="mb-0 text-black-50">Unpaid</p>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="recent-orders mt-3">
        <h4 class="d-flex justify-content-between">Recent orders <a class="h6 mt-2 mb-0" href="{{ route('customer.order.index') }}">View All</a></h4>
        @foreach ($user->orders()->orderBy('created_at', 'DESC')->limit(5)->get() as $order)
            <div class="bg-white shadow p-3 rounded border d-flex justify-content-between mb-2">
                <div class="left">
                    <a href="{{ route('customer.order.show', $order->number) }}">
                        #{{ $order->number }}
                    </a>
                    <span class="text-muted">{{ $order->created_at->diffForHumans() }}</span>
                </div>
                <div class="right">
                    @switch($order->status)
                        @case('unpaid')
                            <span class="badge badge-danger">Unpaid</span>
                            @break
                        @case('paid')
                            <span class="badge badge-success">Paid</span>
                            @break
                        @default
                        <span class="badge badge-primary">Completed</span>   
                    @endswitch
                </div>
            </div>
        @endforeach
    </div>
@endsection