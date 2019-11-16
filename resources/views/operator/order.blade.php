@extends('layouts.operator')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid pb-5">
    @include('components.alerts')
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card card-body shadow border-left-primary">
                <h5 class="text-primary">Customer Information</h5>
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th class="pl-0">Name</th>
                            <td>{{ $order->customer->name }}</td>
                        </tr>
                        <tr>
                            <th class="pl-0">Email</th>
                            <td>{{ $order->customer->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form method="POST" action="{{ route('operator.order.update', $order->id) }}" class="row mt-3">
                @csrf
                @method('PATCH')
                <div class="col-12">
                    <h6>Change status order</h6>
                </div>
                <div class="form-group col-md-6">
                    <select name="status" id="status" class="form-control">
                        <option value="{{ $order->status }}">{{ ucfirst($order->status) }}</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="paid">Paid</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary shadow btn-block">Change Status</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card card-body">
                <h5 class="text-primary">Order Information</h5>
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th class="pl-0 align-middle">Order Number</th>
                            <td>{{ $order->number }}</td>
                        </tr>
                        <tr>
                            <th class="pl-0 align-middle">Order Status</th>
                            <td>
                                @switch($order->status)
                                    @case('completed')
                                        <span class="badge badge-success">Completed</span>
                                        @break
                                    @case('paid')
                                        <span class="badge badge-primary">Paid</span>
                                        @break
                                    @default
                                        <span class="badge badge-danger">Unpaid</span>
                                @endswitch
                            </td>
                        </tr>
                        @if($order->pickup)
                        <tr>
                            <th class="pl-0 align-middle">Pickup Address</th>
                            <td>{!! nl2br($order->address) !!}</td>
                        </tr>
                        @endif
                        @if($order->status == 'paid')
                        <tr>
                            <th class="pl-0 align-middle">Estimate to complete</th>
                            <td>{{ $order->estimate->diffForHumans() }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th class="pl-0">Sub Total</th>
                            <td>{{ numToRupiah($order->total - $shipping) }}</td>
                        </tr>
                        <tr>
                            <th class="pl-0">Shipping</th>
                            <td>{{ numToRupiah($shipping) }}</td>
                        </tr>
                        <tr>
                            <th class="pl-0">Total</th>
                            <td>{{ numToRupiah($order->total) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card card-body mt-2">
                <h5 class="text-primary">Order Items</h5>
                <table class="table mb-0">
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
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection