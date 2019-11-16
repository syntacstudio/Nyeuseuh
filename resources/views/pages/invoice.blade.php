@extends('layouts.default')
@section('title', $order->number.' - Nyeuseuh')

@section('content')
<section class="order py-4 @if(!Auth::check()) guest @endif">
<form id="order">
    @csrf
    <div class="container pb-md-5">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="mb-3 d-flex justify-content-between">
                    <h2>Order Details</h2>
                    <a href="{{ route('customer.index') }}" class="h6 mt-md-3">Visit My Account</a>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/logo.png') }}" class="mt-md-3" height="45">

                                <div class="mt-3">
                                    <p class="text-black-50 mb-0">To</p>
                                    <p>{{ $order->customer->name }} <br>
                                        {{ $order->customer->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2 class="text-primary">INVOICE</h2>
                                <h6 class="text-black-50">#{{ $order->number }}</h6>
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <th class="w-50">Invoice Date</th>
                                            <td><b>:</b> {{ $order->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>

                                            <td><b>:</b> 
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
                                        <tr>
                                            <th>Delivery estimation</th>
                                            <td><b>:</b> {{ \Carbon\Carbon::now()->diffInMinutes($order->estimate, false)
                                                 }} Minutes</td>
                                        </tr>
                                        @if($order->pickup)
                                        <tr>
                                            <th>Delivery Address</th>
                                            <td>{!! nl2br($order->address) !!}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <table class="table table-bordered mb-0 mt-3">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ numToRupiah($item->price) }}</td>
                                        <td>{{ $item->quantity }} pcs</td>
                                        <td>{{ numToRupiah($item->total) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @if($order->pickup)
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold">Sub Total</td>
                                    <td class="font-weight-bold">{{ numToRupiah($order->items()->sum('total') - 10000) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold">Shipping</td>
                                    <td class="font-weight-bold">{{ numToRupiah(10000) }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold">Total</td>
                                    <td class="font-weight-bold">{{ numToRupiah($order->items()->sum('total')) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
@endsection
