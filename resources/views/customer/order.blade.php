@extends('layouts.account')
@section('title', 'My Orders')

@section('content')
    
    <div class="card card-body p-3">
        <h5>Orders {{ $order->number }}</h5>

        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <th class="bg-light">Order Date</th>
                    <td> {{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Status</th>
                    <td>
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
                    </td>
                </tr>
            @if($order->status == 'paid')
                <tr>
                    <th class="bg-light">Delivery Estimate</th>
                    <td>{{ numToRupiah($order->items()->sum('total') - 10000) }}</td>
                </tr>
            @endif

                <tr>
                    <th class="bg-light">Pickup order</th>
                    <td>{{ ($order->pickup) ? 'Yes' : 'No' }}</td>
                </tr>
            @if($order->pickup)
                <tr>
                    <th class="bg-light">Pickup Address</th>
                    <td>{!! nl2br($order->address) !!}</td>
                </tr>
            @endif
                <tr>
                    <th class="bg-light">Sub total</th>
                    <td>{{ numToRupiah($order->items()->sum('total') - 10000) }}</td>
                </tr>
            @if($order->pickup)
                <tr>
                    <th class="bg-light">Shipping cost</th>
                    <td> {{ numToRupiah(10000) }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Total</th>
                    <td>{{ numToRupiah($order->items()->sum('total') - 10000) }}</td>
                </tr>
            @else 
                <tr>
                    <th class="bg-light">Total</th>
                    <td>{{ numToRupiah($order->items()->sum('total')) }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="card card-body p-3 mt-3">
        <h5>Items detail</h5>

        <table class="table table-bordered mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ numToRupiah($item->price) }}</td>
                    <td>{{ numToRupiah($item->total) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection