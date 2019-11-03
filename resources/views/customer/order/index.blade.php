@extends('layouts.account')
@section('title', 'My Orders')

@section('content')
    <h4>My Orders</h4>
    @foreach ($orders as $order)
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
    <div class="mt-3">
        {{ $orders->links() }}
    </div>
@endsection